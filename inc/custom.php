<?php
function product_attribute_badge_shortcode($atts) {
    $product_id = get_the_ID();
    $product    = wc_get_product($product_id);

    if ( ! $product ) {
        error_log('No product found for product ID: ' . $product_id);
        return ''; // Rückgabe bei fehlendem Produkt
    }

    $atts = shortcode_atts(array(
        'name'  => '', // Name des Custom Fields oder Attributs
        'class' => '', // Optionale zusätzliche CSS-Klasse
    ), $atts, 'product_attribute');

    // Attribut- oder Custom Field-Wert abrufen
    $attribute_value = $product->get_attribute($atts['name']);
    if ( ! $attribute_value ) {
        return '';
    }

    // Wenn mehrere Werte vorliegen, diese anhand von Kommas trennen
    $values = array_map('trim', explode(',', $attribute_value));

    // Erstelle ein Array, in dem jede einzelne Badge als Span gespeichert wird
    $badges = array();

    foreach ($values as $value) {
        if ( empty($value) ) {
            continue;
        }

        // Bewertung standardisieren (z.B. "A++", "B+")
        $rating = strtoupper(trim($value));

        // Entscheide anhand der Bewertung die entsprechende Farbkategorie
        switch ($rating) {
            case 'A+++':
                $color_class = 'a-plus-plus-plus';
                break;
            case 'A++':
                $color_class = 'a-plus-plus';
                break;
            case 'A+':
                $color_class = 'a-plus';
                break;
            case 'A':
                $color_class = 'a';
                break;
            case 'B++':
                $color_class = 'b-plus-plus';
                break;
            case 'B+':
                $color_class = 'b-plus';
                break;
            case 'B':
                $color_class = 'b';
                break;
            case 'C++':
                $color_class = 'c-plus-plus';
                break;
            case 'C+':
                $color_class = 'c-plus';
                break;
            case 'C':
                $color_class = 'c';
                break;
            case 'D':
                $color_class = 'd';
                break;
            case 'E':
                $color_class = 'e';
                break;
            case 'F':
                $color_class = 'f';
                break;
            case 'G':
                $color_class = 'g';
                break;
            default:
                $color_class = 'default';
                break;
        }

        // Basis-Badge-Klassen, die das Layout definieren
        // Hier wird keine absolute Positionierung mehr gesetzt, da der Container dies übernimmt.
        $base_classes = "badge fw-bold mb-1 me-1 w-50";
        // Kombiniere optionale Zusatzklassen, die Farbklasse und Basis-Klassen
        $final_class  = trim(($atts['class'] ? $atts['class'] . ' ' : '') . $color_class . ' ' . $base_classes);

        $badges[] = "<span class='{$final_class}'>{$rating}</span>";
    }

    if ( empty($badges) ) {
        return '';
    }

    // Um mehrere Badges anzuzeigen, werden diese in einen Container mit flex display verpackt.
    // Der Container ist positioniert (absolute) innerhalb des Bildes (stellen Sie sicher,
    // dass das Elternelement position: relative hat).
    $container_style = "position: absolute; bottom: 1px; right: 1px; display: flex; flex-direction: column-reverse; align-items: flex-end; gap: 0.125rem; min-width: 6rem;";
    $badges_html = implode(" ", $badges);

    return "<div style='{$container_style}'>{$badges_html}</div>";
}

add_shortcode('product_attribute_badge', 'product_attribute_badge_shortcode');
?>