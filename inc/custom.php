<?php
// -------------------------------------------------------------------
// Admin: Bild-Feld zu Attribut-Terms (z. B. pa_energy) hinzufügen
// -------------------------------------------------------------------

// Registriere globale Hooks für alle Attribut-Taxonomien (Taxonomien, die mit "pa_" beginnen)
/* function register_all_attribute_image_fields() {
    $taxonomies = get_taxonomies(array('public' => true, 'show_ui' => true), 'names');
    foreach ($taxonomies as $taxonomy) {
        if (strpos($taxonomy, 'pa_') === 0) {
            add_action("{$taxonomy}_add_form_fields", 'global_add_attribute_image_field', 10, 2);
            add_action("{$taxonomy}_edit_form_fields", 'global_edit_attribute_image_field', 10, 2);
            add_action("edited_{$taxonomy}", 'global_save_attribute_image_field', 10, 2);
            add_action("create_{$taxonomy}", 'global_save_attribute_image_field', 10, 2);
        }
    }
}
add_action('init', 'register_all_attribute_image_fields');


// Neues Attribut-Term-Feld (Bild) in der "Hinzufügen"-Maske (für alle Attribute)
function global_add_attribute_image_field($taxonomy) { ?>
    <div class="form-field term-group">
        <label for="attribute-image-id"><?php _e('Bild', 'your-text-domain'); ?></label>
        <input type="hidden" id="attribute-image-id" name="attribute-image-id" value="">
        <div id="attribute-image-wrapper"></div>
        <p>
            <input type="button" class="button button-secondary attribute_media_button" id="attribute_media_button" value="<?php _e('Bild hochladen', 'your-text-domain'); ?>" />
            <input type="button" class="button button-secondary attribute_media_remove" id="attribute_media_remove" value="<?php _e('Bild entfernen', 'your-text-domain'); ?>" />
        </p>
    </div>
    <script>
jQuery(document).ready(function($) {
    function open_media_modal(button) {
        var custom_uploader = wp.media({
            title: '<?php _e("Bild auswählen", "your-text-domain"); ?>',
            button: {
                text: '<?php _e("Bild auswählen", "your-text-domain"); ?>'
            },
            multiple: false
        }).on('select', function() {
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            // Setze die Attachment-ID und das Bild in das Wrapper-Feld
            button.closest('div.term-group').find('#attribute-image-id').val(attachment.id);
            button.closest('div.term-group').find('#attribute-image-wrapper').html('<img src="'+attachment.url+'" style="max-width:100%;"/>');
        }).open();
    }

    // Öffnet den Media-Uploader wenn auf "Bild hochladen" geklickt wird
    $(document).on('click', '.attribute_media_button', function(e) {
        e.preventDefault();
        open_media_modal($(this));
    });

    // Entfernt das Bild
    $(document).on('click', '.attribute_media_remove', function(e) {
        e.preventDefault();
        var container = $(this).closest('div.term-group');
        container.find('#attribute-image-id').val('');
        container.find('#attribute-image-wrapper').html('');
    });
});
</script>
<?php } // Ende der Funktion

// Bild-Feld in der Bearbeitungsmaske (für alle Attribute)
function global_edit_attribute_image_field($term, $taxonomy) {
    $image_id  = get_term_meta($term->term_id, 'attribute-image-id', true);
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="attribute-image-id"><?php _e('Bild', 'your-text-domain'); ?></label></th>
        <td>
            <input type="hidden" id="attribute-image-id" name="attribute-image-id" value="<?php echo esc_attr($image_id); ?>">
            <div id="attribute-image-wrapper">
                <?php if ($image_url) { echo '<img src="' . esc_url($image_url) . '" style="max-width:100%;"/>'; } ?>
            </div>
            <p>
                <input type="button" class="button button-secondary attribute_media_button" id="attribute_media_button" value="<?php _e('Bild hochladen', 'your-text-domain'); ?>" />
                <input type="button" class="button button-secondary attribute_media_remove" id="attribute_media_remove" value="<?php _e('Bild entfernen', 'your-text-domain'); ?>" />
            </p>
        </td>
    </tr>
    <script>
    jQuery(document).ready(function($) {
        function attribute_media_upload_edit() {
            var custom_uploader = wp.media({
                title: '<?php _e('Bild auswählen', 'your-text-domain'); ?>',
                button: { text: '<?php _e('Dieses Bild verwenden', 'your-text-domain'); ?>' },
                multiple: false
            }).on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('#attribute-image-id').val(attachment.id);
                $('#attribute-image-wrapper').html('<img src="'+attachment.sizes.thumbnail.url+'" style="max-width:100%;"/>');
            }).open();
        }
        $('#attribute_media_button').on('click', function(e) {
            e.preventDefault();
            attribute_media_upload_edit();
        });
        $('#attribute_media_remove').on('click', function(){
            $('#attribute-image-id').val('');
            $('#attribute-image-wrapper').html('');
        });
    });
    </script>
<?php }

// Speichern des Bild-Feldes beim Erstellen und Bearbeiten (für alle Attribute)
function global_save_attribute_image_field($term_id) {
    if (isset($_POST['attribute-image-id'])) {
        update_term_meta($term_id, 'attribute-image-id', sanitize_text_field($_POST['attribute-image-id']));
    }
}
// -------------------------------------------------------------------
// Shortcode zur Anzeige der Bilder der Begriffe eines beliebigen Attributs
// -------------------------------------------------------------------
add_shortcode('display_pa_images', 'display_pa_images_shortcode');
function display_pa_images_shortcode($atts) {
    $atts = shortcode_atts([
        'name'  => '', // Standardattribut, kann überschrieben werden, z. B. 'pa_color'
        'class' => ''
    ], $atts, 'display_pa_images');

    global $post;
    $terms = get_the_terms($post->ID, $atts['name']);
    if (!$terms || is_wp_error($terms)) {
        return '';
    }

    $html = '';
    foreach ($terms as $term) {
        $image_id = get_term_meta($term->term_id, 'attribute-image-id', true);
        if ($image_id) {
            $img_url = wp_get_attachment_url($image_id);
            if ($img_url) {
                $html .= '<img src="' . esc_url($img_url) . '" alt="' . esc_attr($term->name) . '" class="' . esc_attr($atts['class']) . '" /> ';
            }
        }
    }
    return $html;
}
?> */