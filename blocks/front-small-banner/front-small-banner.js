
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
    
    const block = registerBlockType( 'oe-shop/front-small-banner', {
        apiVersion: 2,
        title: 'Front Small Banner',
        description: '',
        icon: 'block-default',
        category: 'shop',
        parent: [ 'oe-shop/front-small-banners' ],

        keywords: [],
        supports: {},
        attributes: {
            image: {
                type: ['object', 'null'],
                default: {id: 0, url: 'https://images.unsplash.com/photo-1467043237213-65f2da53396f?fp-z=3.75&fp-y=.5&fp-x=0&crop=focalpoint&fit=crop&w=280&h=200', size: '', svg: '', alt: 'Product image'},
            },
            title: {
                type: ['string', 'null'],
                default: `Mens Summer Collection`,
            },
            link_label: {
                type: ['string', 'null'],
                default: `View Collection`,
            },
            link_url: {
                type: ['object', 'null'],
                default: {post_id: 0, url: '#', title: '', 'post_type': null},
            }
        },
        example: { attributes: { image: {id: 0, url: 'https://images.unsplash.com/photo-1467043237213-65f2da53396f?fp-z=3.75&fp-y=.5&fp-x=0&crop=focalpoint&fit=crop&w=280&h=200', size: '', svg: '', alt: 'Product image'}, title: `Mens Summer Collection`, link_label: `View Collection`, link_url: {post_id: 0, url: '#', title: '', 'post_type': null} } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'col-md col-sm-6 py-3' });
            const setAttributes = props.setAttributes; 
            
            props.image = useSelect(function( select ) {
                return {
                    image: props.attributes.image.id ? select('core').getMedia(props.attributes.image.id) : undefined
                };
            }, [props.attributes.image] ).image;
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', el('div', { className: 'position-relative text-dark' }, [' ', props.attributes.image && props.attributes.image.svg && pgCreateSVG3(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.image.svg, 'image', 'svg' ), { className: 'img-fluid w-100' })), props.attributes.image && !props.attributes.image.svg && propOrDefault( props.attributes.image.url, 'image', 'url' ) && el('img', { src: propOrDefault( props.attributes.image.url, 'image', 'url' ), className: 'img-fluid w-100 ' + (props.attributes.image.id ? ('wp-image-' + props.attributes.image.id) : ''), alt: propOrDefault( props.attributes.image?.alt, 'image', 'alt' ), width: '280', height: '200' }), ' ', el('div', { className: 'bottom-0 end-0  pb-5 pe-4 position-absolute ps-4 start-0' }, [' ', el(RichText, { tagName: 'h2', className: 'h5 mb-3', value: propOrDefault( props.attributes.title, 'title' ), onChange: function(val) { setAttributes( {title: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), el(RichText, { tagName: 'a', href: propOrDefault( props.attributes.link_url.url, 'link_url', 'url' ), className: 'link-secondary small stretched-link text-decoration-none', onClick: function(e) { e.preventDefault(); }, value: propOrDefault( props.attributes.link_label, 'link_label' ), onChange: function(val) { setAttributes( {link_label: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ']), ' ']), ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('image', setAttributes, props, 'woocommerce_thumbnail', true, 'Image', '' ),
                                        
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
                                        value: props.attributes.link_label,
                                        help: __( '' ),
                                        label: __( 'Link label' ),
                                        onChange: function(val) { setAttributes({link_label: val}) },
                                        type: 'text'
                                    }),
                                    pgUrlControl('link_url', setAttributes, props, 'Link address', '', null ),    
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
