
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
    
    const block = registerBlockType( 'oe-shop/shop-categories', {
        apiVersion: 2,
        title: 'Shop Categories',
        description: '',
        icon: 'block-default',
        category: 'shop',
        keywords: [],
        supports: {},
        attributes: {
            parent: {
                type: ['string', 'null'],
                default: '0',
            },
            title: {
                type: ['string', 'null'],
                default: `Subcategories`,
            }
        },
        example: { attributes: { parent: '', title: `Subcategories` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({});
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', el('section', { className: 'bg-light pb-5 pg-lib-item pt-5 text-secondary' }, [' ', el('div', { className: 'container pb-5 pt-5' }, [' ', el(RichText, { tagName: 'h1', className: 'h2 mb-4 text-dark', value: propOrDefault( props.attributes.title, 'title' ), onChange: function(val) { setAttributes( {title: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ', el('div', { className: 'g-md-5 gy-4 justify-content-center row row-cols-lg-3 row-cols-sm-2', 'data-pg-name': 'Categories Container' }, [' ', el('div', { 'data-pg-name': 'Repeated Category' }, [' ', el('a', { href: '#', className: 'd-block link-dark position-relative' }, [el('img', { src: 'https://images.unsplash.com/photo-1544441893-675973e31985?ixid=MnwyMDkyMnwwfDF8c2VhcmNofDN8fGNsb3RoaW5nfGVufDB8fHx8MTY0NjIzNzg5Nw&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=500&h=600&fit=crop', className: 'img-fluid rounded w-100', alt: '...', width: '500', height: '600' }), el('div', { className: 'bg-white bottom-0 end-0 mb-3 me-3 ms-3 p-4 position-absolute rounded start-0' }, [' ', el('h2', { className: 'fw-bold h5 mb-0' }, [el('span', {}, 'Clothing'), ' (', el('span', {}, '32'), ')']), ' '])]), ' ']), ' ', ' ', ' ']), ' ']), ' ']), ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                            el(Panel, {},
                                el(PanelBody, {
                                    title: __('Block properties')
                                }, [
                                    
                                    el(TextControl, {
                                        value: props.attributes.parent,
                                        help: __( '' ),
                                        label: __( 'Parent category' ),
                                        onChange: function(val) { setAttributes({parent: val}) },
                                        type: 'text'
                                    }),
                                    el(TextControl, {
                                        value: props.attributes.title,
                                        help: __( '' ),
                                        label: __( 'Title' ),
                                        onChange: function(val) { setAttributes({title: val}) },
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
