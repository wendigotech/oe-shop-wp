
( function ( blocks, element, blockEditor ) {
    const el = element.createElement,
        registerBlockType = blocks.registerBlockType,
        ServerSideRender = PgServerSideRender3,
        InspectorControls = blockEditor.InspectorControls,
        useBlockProps = blockEditor.useBlockProps;
        
    const {__} = wp.i18n;
    const {ColorPicker, TextControl, ToggleControl, SelectControl, Panel, PanelBody, Disabled, TextareaControl, BaseControl} = wp.components;
    const {useSelect} = wp.data;
    const {RawHTML, Fragment} = element;
   
    const {InnerBlocks, URLInputButton, RichText} = wp.blockEditor;
    const useInnerBlocksProps = blockEditor.useInnerBlocksProps || blockEditor.__experimentalUseInnerBlocksProps;
    
    const propOrDefault = function(val, prop, field) {
        if(block.attributes[prop] && (val === null || val === '')) {
            return field ? block.attributes[prop].default[field] : block.attributes[prop].default;
        }
        return val;
    }
    
    const block = registerBlockType( 'oe-shop/shop-newsletter', {
        apiVersion: 2,
        title: 'Shop Newsletter',
        description: '',
        icon: 'block-default',
        category: 'shop',
        keywords: [],
        supports: {},
        attributes: {
            title: {
                type: ['string', 'null'],
                default: `Join our newsletter and get 15% off`,
            },
            subtitle: {
                type: ['string', 'null'],
                default: `Sign up for our newsletter to receive updates and exclusive offers`,
            }
        },
        example: { attributes: { title: `Join our newsletter and get 15% off`, subtitle: `Sign up for our newsletter to receive updates and exclusive offers` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'bg-light mt-4 pb-5 pt-5 text-center', id: 'newsletter_mailer_id' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('section', { ...blockProps }, [' ', el('div', { className: 'container pb-4 pt-4' }, [' ', el('div', { className: 'row' }, [' ', el('div', { className: 'col-lg-8 ms-auto me-auto py-3' }, [' ', el(RichText, { tagName: 'h2', className: 'text-dark', value: propOrDefault( props.attributes.title, 'title' ), onChange: function(val) { setAttributes( {title: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', el(RichText, { tagName: 'p', className: 'mb-5 text-secondary', value: propOrDefault( props.attributes.subtitle, 'subtitle' ), onChange: function(val) { setAttributes( {subtitle: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', el('div', { className: 'col-md-9 col-xl-8 ms-auto me-auto' }, [' ', el('form', {}, [' ', el('div', { className: 'bg-white border input-group overflow-hidden p-1' }, [' ', el('input', { type: 'text', className: 'border-0 form-control pe-3 ps-3', placeholder: 'Enter email...', 'aria-label': 'Recipient\'s email', 'aria-describedby': 'newsletter-submit' }), ' ', el('button', { className: 'btn btn-dark pb-2 pe-4 ps-4 pt-2 rounded-0', type: 'submit', id: 'newsletter-submit' }, 'Sign Up'), ' ']), ' ', el('div', { className: 'alert alert-success' }, 'Thank you for subscribing!'), ' ']), ' ']), ' ']), ' ']), ' ']), ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(TextControl, {
                                        value: props.attributes.title,
                                        help: __( '' ),
                                        label: __( 'Title' ),
                                        onChange: function(val) { setAttributes({title: val}) },
                                        type: 'text'
                                    }),
                                    el(TextControl, {
                                        value: props.attributes.subtitle,
                                        help: __( '' ),
                                        label: __( 'Subtitle' ),
                                        onChange: function(val) { setAttributes({subtitle: val}) },
                                        type: 'text'
                                    }),    
                                ])
                            )
                        ]
                    )                            

            ]);
        },

        save: function(props) {
            return null;
        }                        

    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);                        
