
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
    
    const block = registerBlockType( 'oe-shop/shop-sidebar-heading', {
        apiVersion: 2,
        title: 'Shop Sidebar Heading',
        description: '',
        icon: 'block-default',
        category: 'shop',
        keywords: [],
        supports: {},
        attributes: {
            heading: {
                type: ['string', 'null'],
                default: `Search`,
            }
        },
        example: { attributes: { heading: `Search` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'mb-4' });
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', el(RichText, { tagName: 'h2', className: 'h5 text-dark', value: propOrDefault( props.attributes.heading, 'heading' ), onChange: function(val) { setAttributes( {heading: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', el('hr', { className: 'mb-4' }), ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(TextControl, {
                                        value: props.attributes.heading,
                                        help: __( '' ),
                                        label: __( 'Heading' ),
                                        onChange: function(val) { setAttributes({heading: val}) },
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
