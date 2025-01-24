
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
    
    const block = registerBlockType( 'oe-shop/shop-feature', {
        apiVersion: 2,
        title: 'Shop Feature',
        description: '',
        icon: 'block-default',
        category: 'shop',
        keywords: [],
        supports: {},
        attributes: {
            image: {
                type: ['object', 'null'],
                default: {id: 0, url: '', size: '', svg: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="3rem" height="3rem" class="mb-3 text-dark" version="1.1">
    <g>
        <path fill="none" d="M0 0h24v24H0z"/>
        <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"/>
    </g>
</svg>`, alt: null},
            },
            title: {
                type: ['string', 'null'],
                default: `Free Shipping`,
            },
            text: {
                type: ['string', 'null'],
                default: `Lorem ipsum dolor sit amet, consectetur adipiscing elit eiusmod`,
            }
        },
        example: { attributes: { image: {id: 0, url: '', size: '', svg: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="3rem" height="3rem" class="mb-3 text-dark" version="1.1">
    <g>
        <path fill="none" d="M0 0h24v24H0z"/>
        <path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"/>
    </g>
</svg>`, alt: null}, title: `Free Shipping`, text: `Lorem ipsum dolor sit amet, consectetur adipiscing elit eiusmod` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'col-lg-4 col-sm-6 pb-3 pt-3' });
            const setAttributes = props.setAttributes; 
            
            props.image = useSelect(function( select ) {
                return {
                    image: props.attributes.image.id ? select('core').getMedia(props.attributes.image.id) : undefined
                };
            }, [props.attributes.image] ).image;
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', el('div', {}, [' ', props.attributes.image && !props.attributes.image.url && propOrDefault( props.attributes.image.svg, 'image', 'svg' ) && pgCreateSVG3(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.image.svg, 'image', 'svg' ), { className: 'mb-3 text-dark' })), props.attributes.image && props.attributes.image.url && el('img', { className: 'mb-3 text-dark ' + (props.attributes.image.id ? ('wp-image-' + props.attributes.image.id) : ''), src: propOrDefault( props.attributes.image.url, 'image', 'url' ) }), ' ', el(RichText, { tagName: 'h2', className: 'fw-bold h5 mb-3 text-dark', value: propOrDefault( props.attributes.title, 'title' ), onChange: function(val) { setAttributes( {title: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', el(RichText, { tagName: 'p', className: 'mb-0', value: propOrDefault( props.attributes.text, 'text' ), onChange: function(val) { setAttributes( {text: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ']), ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('image', setAttributes, props, 'full', true, 'Image', '' ),
                                        
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
                                        value: props.attributes.text,
                                        help: __( '' ),
                                        label: __( 'Text' ),
                                        onChange: function(val) { setAttributes({text: val}) },
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
