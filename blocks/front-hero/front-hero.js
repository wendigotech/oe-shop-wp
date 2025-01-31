
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
    
    const block = registerBlockType( 'oe-shop/front-hero', {
        apiVersion: 2,
        title: 'Front Hero',
        description: '',
        icon: 'block-default',
        category: 'shop',
        keywords: [],
        supports: {},
        attributes: {
            background: {
                type: ['object', 'null'],
                default: {id: 0, url: 'https://images.unsplash.com/photo-1523381294911-8d3cead13475?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwyMDkyMnwwfDF8c2VhcmNofDI0fHxmYXNoaW9uJTIwc2hvb3R8ZW58MHx8fA&ixlib=rb-1.2.1&q=80&w=1080', size: '', svg: '', alt: null},
            },
            sup_heading: {
                type: ['string', 'null'],
                default: '',
            },
            heading: {
                type: ['string', 'null'],
                default: `Best Fabric Meets New Style`,
            },
            tagline: {
                type: ['string', 'null'],
                default: '',
            },
            button_link: {
                type: ['object', 'null'],
                default: {post_id: 0, url: '', title: '', 'post_type': null},
            },
            button_label: {
                type: ['string', 'null'],
                default: `Shop Collection`,
            }
        },
        example: { attributes: { background: {id: 0, url: 'https://images.unsplash.com/photo-1523381294911-8d3cead13475?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwyMDkyMnwwfDF8c2VhcmNofDI0fHxmYXNoaW9uJTIwc2hvb3R8ZW58MHx8fA&ixlib=rb-1.2.1&q=80&w=1080', size: '', svg: '', alt: null}, sup_heading: `New Collection`, heading: `Best Fabric Meets New Style`, tagline: `Our ability to feel, act and communicate is indistinguishable from magic.`, button_link: {post_id: 0, url: '#', title: '', 'post_type': null}, button_label: `Shop Collection` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'background-cover bg-dark pb-5 position-relative pt-5 text-white', style: { ...((propOrDefault( props.attributes.background.url, 'background', 'url' ) ? ('url(' + propOrDefault( props.attributes.background.url, 'background', 'url' ) + ')') : null !== null && propOrDefault( props.attributes.background.url, 'background', 'url' ) ? ('url(' + propOrDefault( props.attributes.background.url, 'background', 'url' ) + ')') : null !== '') ? {backgroundImage: propOrDefault( props.attributes.background.url, 'background', 'url' ) ? ('url(' + propOrDefault( props.attributes.background.url, 'background', 'url' ) + ')') : null} : {}) } });
            const setAttributes = props.setAttributes; 
            
            props.background = useSelect(function( select ) {
                return {
                    background: props.attributes.background.id ? select('core').getMedia(props.attributes.background.id) : undefined
                };
            }, [props.attributes.background] ).background;
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('section', { ...blockProps }, [' ', el('div', { className: 'container pb-5 pt-5' }, [' ', el('div', { className: 'pb-5 pt-5 row' }, [' ', el('div', { className: 'col-lg-7 pb-5 pt-5' }, [' ', props.attributes.sup_heading && el(RichText, { tagName: 'p', className: 'fw-normal h4 text-uppercase', value: props.attributes.sup_heading, onChange: function(val) { setAttributes( {sup_heading: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', el(RichText, { tagName: 'h1', className: 'display-3 fw-bold mb-3', value: propOrDefault( props.attributes.heading, 'heading' ), onChange: function(val) { setAttributes( {heading: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', props.attributes.tagline && el(RichText, { tagName: 'p', className: 'lead mb-4', value: props.attributes.tagline, onChange: function(val) { setAttributes( {tagline: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), props.attributes.button_link && props.attributes.button_link.url && el(RichText, { tagName: 'a', href: props.attributes.button_link.url, className: 'btn btn-light pb-2 ps-4 pe-4 pt-2', onClick: function(e) { e.preventDefault(); }, value: propOrDefault( props.attributes.button_label, 'button_label' ), onChange: function(val) { setAttributes( {button_label: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ']), ' ']), ' ']), ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('background', setAttributes, props, 'full', true, 'Background image', '' ),
                                        
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(TextControl, {
                                        value: props.attributes.sup_heading,
                                        help: __( '' ),
                                        label: __( 'Upper heading' ),
                                        onChange: function(val) { setAttributes({sup_heading: val}) },
                                        type: 'text'
                                    }),
                                    el(TextControl, {
                                        value: props.attributes.heading,
                                        help: __( '' ),
                                        label: __( 'Heading' ),
                                        onChange: function(val) { setAttributes({heading: val}) },
                                        type: 'text'
                                    }),
                                    el(TextControl, {
                                        value: props.attributes.tagline,
                                        help: __( '' ),
                                        label: __( 'Tagline' ),
                                        onChange: function(val) { setAttributes({tagline: val}) },
                                        type: 'text'
                                    }),
                                    pgUrlControl('button_link', setAttributes, props, 'Button link', '', null ),
                                    el(TextControl, {
                                        value: props.attributes.button_label,
                                        help: __( '' ),
                                        label: __( 'Button label' ),
                                        onChange: function(val) { setAttributes({button_label: val}) },
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
