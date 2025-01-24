
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
    
    const block = registerBlockType( 'oe-shop/shop-front-cta', {
        apiVersion: 2,
        title: 'Shop Front CTA',
        description: '',
        icon: 'block-default',
        category: 'shop',
        keywords: [],
        supports: {},
        attributes: {
            top_title: {
                type: ['string', 'null'],
                default: '',
            },
            text: {
                type: ['string', 'null'],
                default: `Seasonal Sale Upto 70% off`,
            },
            link: {
                type: ['object', 'null'],
                default: {post_id: 0, url: '', title: '', 'post_type': null},
            },
            label: {
                type: ['string', 'null'],
                default: `Shop Collection`,
            },
            image: {
                type: ['object', 'null'],
                default: {id: 0, url: 'https://images.unsplash.com/photo-1610970161790-57a21fc7d775?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=480&h=360&fit=crop', size: '', svg: '', alt: 'CTA image'},
            }
        },
        example: { attributes: { top_title: `Grab your collection today`, text: `Seasonal Sale Upto 70% off`, link: {post_id: 0, url: '#', title: '', 'post_type': null}, label: `Shop Collection`, image: {id: 0, url: 'https://images.unsplash.com/photo-1610970161790-57a21fc7d775?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=480&h=360&fit=crop', size: '', svg: '', alt: 'CTA image'} } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: ' pb-3 pt-3 text-center' });
            const setAttributes = props.setAttributes; 
            
            props.image = useSelect(function( select ) {
                return {
                    image: props.attributes.image.id ? select('core').getMedia(props.attributes.image.id) : undefined
                };
            }, [props.attributes.image] ).image;
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('section', { ...blockProps }, [' ', el('div', { className: 'container' }, [' ', el('div', { className: 'bg-dark text-white' }, [' ', el('div', { className: 'align-items-center row' }, [' ', el('div', { className: 'col-lg-6 pb-5 pb-lg-0 pt-5 pt-lg-0' }, [' ', el('div', { className: 'ps-5 pe-5' }, [' ', props.attributes.top_title && el(RichText, { tagName: 'h2', className: 'fw-normal h5 mb-1 text-white-50', value: props.attributes.top_title, onChange: function(val) { setAttributes( {top_title: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', el(RichText, { tagName: 'h3', className: 'fw-bold h1 mb-4', value: propOrDefault( props.attributes.text, 'text' ), onChange: function(val) { setAttributes( {text: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', props.attributes.link && props.attributes.link.url && el(RichText, { tagName: 'a', href: props.attributes.link.url, className: 'btn btn-light pb-2 ps-4 pe-4 pt-2', onClick: function(e) { e.preventDefault(); }, value: propOrDefault( props.attributes.label, 'label' ), onChange: function(val) { setAttributes( {label: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ']), ' ']), ' ', el('div', { className: 'col-lg-6' }, [' ', props.attributes.image && props.attributes.image.svg && pgCreateSVG3(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.image.svg, 'image', 'svg' ), { className: 'd-block img-fluid w-100', style: { maxHeight: '320px',objectFit: 'cover' } })), props.attributes.image && !props.attributes.image.svg && propOrDefault( props.attributes.image.url, 'image', 'url' ) && el('img', { src: propOrDefault( props.attributes.image.url, 'image', 'url' ), className: 'd-block img-fluid w-100 ' + (props.attributes.image.id ? ('wp-image-' + props.attributes.image.id) : ''), alt: propOrDefault( props.attributes.image?.alt, 'image', 'alt' ), width: '480', height: '360', style: { maxHeight: '320px',objectFit: 'cover' } }), ' ']), ' ']), ' ']), ' ']), ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('image', setAttributes, props, 'woocommerce_thumbnail', true, 'Image', '' ),
                                        
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(TextControl, {
                                        value: props.attributes.top_title,
                                        help: __( '' ),
                                        label: __( 'Top title' ),
                                        onChange: function(val) { setAttributes({top_title: val}) },
                                        type: 'text'
                                    }),
                                    el(TextControl, {
                                        value: props.attributes.text,
                                        help: __( '' ),
                                        label: __( 'Text' ),
                                        onChange: function(val) { setAttributes({text: val}) },
                                        type: 'text'
                                    }),
                                    pgUrlControl('link', setAttributes, props, 'link', '', null ),
                                    el(TextControl, {
                                        value: props.attributes.label,
                                        help: __( '' ),
                                        label: __( 'label' ),
                                        onChange: function(val) { setAttributes({label: val}) },
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
