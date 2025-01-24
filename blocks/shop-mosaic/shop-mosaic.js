
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
    
    const block = registerBlockType( 'oe-shop/shop-mosaic', {
        apiVersion: 2,
        title: 'Shop Mosaic',
        description: '',
        icon: 'block-default',
        category: 'shop',
        keywords: [],
        supports: {},
        attributes: {
            image_1: {
                type: ['object', 'null'],
                default: {id: 0, url: 'https://images.unsplash.com/photo-1524738258074-f8125c6a7588?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', size: '', svg: '', alt: 'Instagram image'},
            },
            image_2: {
                type: ['object', 'null'],
                default: {id: 0, url: 'https://images.unsplash.com/photo-1532453288672-3a27e9be9efd?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', size: '', svg: '', alt: 'Instagram image'},
            },
            image_3: {
                type: ['object', 'null'],
                default: {id: 0, url: 'https://images.unsplash.com/photo-1477044545293-98b9221de30a?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', size: '', svg: '', alt: 'Instagram image'},
            },
            image_4: {
                type: ['object', 'null'],
                default: {id: 0, url: 'https://images.unsplash.com/photo-1603217192634-61068e4d4bf9?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', size: '', svg: '', alt: 'Instagram image'},
            },
            image_5: {
                type: ['object', 'null'],
                default: {id: 0, url: 'https://images.unsplash.com/photo-1583001308455-e5d48b880c67?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', size: '', svg: '', alt: 'Instagram image'},
            },
            image_6: {
                type: ['object', 'null'],
                default: {id: 0, url: 'https://images.unsplash.com/photo-1579362094443-5d73793e4d3c?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', size: '', svg: '', alt: 'Instagram image'},
            }
        },
        example: { attributes: { image_1: {id: 0, url: 'https://images.unsplash.com/photo-1524738258074-f8125c6a7588?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', size: '', svg: '', alt: 'Instagram image'}, image_2: {id: 0, url: 'https://images.unsplash.com/photo-1532453288672-3a27e9be9efd?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', size: '', svg: '', alt: 'Instagram image'}, image_3: {id: 0, url: 'https://images.unsplash.com/photo-1477044545293-98b9221de30a?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', size: '', svg: '', alt: 'Instagram image'}, image_4: {id: 0, url: 'https://images.unsplash.com/photo-1603217192634-61068e4d4bf9?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', size: '', svg: '', alt: 'Instagram image'}, image_5: {id: 0, url: 'https://images.unsplash.com/photo-1583001308455-e5d48b880c67?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', size: '', svg: '', alt: 'Instagram image'}, image_6: {id: 0, url: 'https://images.unsplash.com/photo-1579362094443-5d73793e4d3c?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=400&h=400&fit=crop', size: '', svg: '', alt: 'Instagram image'} } },
        edit: function ( props ) {
            const blockProps = useBlockProps({ className: 'container-fluid p-0' });
            const setAttributes = props.setAttributes; 
            
            props.image_1 = useSelect(function( select ) {
                return {
                    image_1: props.attributes.image_1.id ? select('core').getMedia(props.attributes.image_1.id) : undefined
                };
            }, [props.attributes.image_1] ).image_1;
            

            props.image_2 = useSelect(function( select ) {
                return {
                    image_2: props.attributes.image_2.id ? select('core').getMedia(props.attributes.image_2.id) : undefined
                };
            }, [props.attributes.image_2] ).image_2;
            

            props.image_3 = useSelect(function( select ) {
                return {
                    image_3: props.attributes.image_3.id ? select('core').getMedia(props.attributes.image_3.id) : undefined
                };
            }, [props.attributes.image_3] ).image_3;
            

            props.image_4 = useSelect(function( select ) {
                return {
                    image_4: props.attributes.image_4.id ? select('core').getMedia(props.attributes.image_4.id) : undefined
                };
            }, [props.attributes.image_4] ).image_4;
            

            props.image_5 = useSelect(function( select ) {
                return {
                    image_5: props.attributes.image_5.id ? select('core').getMedia(props.attributes.image_5.id) : undefined
                };
            }, [props.attributes.image_5] ).image_5;
            

            props.image_6 = useSelect(function( select ) {
                return {
                    image_6: props.attributes.image_6.id ? select('core').getMedia(props.attributes.image_6.id) : undefined
                };
            }, [props.attributes.image_6] ).image_6;
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('div', { ...blockProps }, [' ', el('div', { className: 'g-0 row' }, [' ', props.attributes.image_1 && props.attributes.image_1.svg && pgCreateSVG3(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.image_1.svg, 'image_1', 'svg' ), { className: 'col-2 img-fluid' })), props.attributes.image_1 && !props.attributes.image_1.svg && propOrDefault( props.attributes.image_1.url, 'image_1', 'url' ) && el('img', { src: propOrDefault( props.attributes.image_1.url, 'image_1', 'url' ), alt: propOrDefault( props.attributes.image_1?.alt, 'image_1', 'alt' ), width: '400', height: '400', className: 'col-2 img-fluid ' + (props.attributes.image_1.id ? ('wp-image-' + props.attributes.image_1.id) : '') }), ' ', props.attributes.image_2 && props.attributes.image_2.svg && pgCreateSVG3(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.image_2.svg, 'image_2', 'svg' ), { className: 'col-2 img-fluid' })), props.attributes.image_2 && !props.attributes.image_2.svg && propOrDefault( props.attributes.image_2.url, 'image_2', 'url' ) && el('img', { src: propOrDefault( props.attributes.image_2.url, 'image_2', 'url' ), alt: propOrDefault( props.attributes.image_2?.alt, 'image_2', 'alt' ), width: '400', height: '400', className: 'col-2 img-fluid ' + (props.attributes.image_2.id ? ('wp-image-' + props.attributes.image_2.id) : '') }), ' ', props.attributes.image_3 && props.attributes.image_3.svg && pgCreateSVG3(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.image_3.svg, 'image_3', 'svg' ), { className: 'col-2 img-fluid' })), props.attributes.image_3 && !props.attributes.image_3.svg && propOrDefault( props.attributes.image_3.url, 'image_3', 'url' ) && el('img', { src: propOrDefault( props.attributes.image_3.url, 'image_3', 'url' ), alt: propOrDefault( props.attributes.image_3?.alt, 'image_3', 'alt' ), width: '400', height: '400', className: 'col-2 img-fluid ' + (props.attributes.image_3.id ? ('wp-image-' + props.attributes.image_3.id) : '') }), ' ', props.attributes.image_4 && props.attributes.image_4.svg && pgCreateSVG3(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.image_4.svg, 'image_4', 'svg' ), { className: 'col-2 img-fluid' })), props.attributes.image_4 && !props.attributes.image_4.svg && propOrDefault( props.attributes.image_4.url, 'image_4', 'url' ) && el('img', { src: propOrDefault( props.attributes.image_4.url, 'image_4', 'url' ), alt: propOrDefault( props.attributes.image_4?.alt, 'image_4', 'alt' ), width: '400', height: '400', className: 'col-2 img-fluid ' + (props.attributes.image_4.id ? ('wp-image-' + props.attributes.image_4.id) : '') }), ' ', props.attributes.image_5 && props.attributes.image_5.svg && pgCreateSVG3(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.image_5.svg, 'image_5', 'svg' ), { className: 'col-2 img-fluid' })), props.attributes.image_5 && !props.attributes.image_5.svg && propOrDefault( props.attributes.image_5.url, 'image_5', 'url' ) && el('img', { src: propOrDefault( props.attributes.image_5.url, 'image_5', 'url' ), alt: propOrDefault( props.attributes.image_5?.alt, 'image_5', 'alt' ), width: '400', height: '400', className: 'col-2 img-fluid ' + (props.attributes.image_5.id ? ('wp-image-' + props.attributes.image_5.id) : '') }), ' ', props.attributes.image_6 && props.attributes.image_6.svg && pgCreateSVG3(RawHTML, {}, pgMergeInlineSVGAttributes(propOrDefault( props.attributes.image_6.svg, 'image_6', 'svg' ), { className: 'col-2 img-fluid' })), props.attributes.image_6 && !props.attributes.image_6.svg && propOrDefault( props.attributes.image_6.url, 'image_6', 'url' ) && el('img', { src: propOrDefault( props.attributes.image_6.url, 'image_6', 'url' ), className: 'col-2 img-fluid ' + (props.attributes.image_6.id ? ('wp-image-' + props.attributes.image_6.id) : ''), alt: propOrDefault( props.attributes.image_6?.alt, 'image_6', 'alt' ), width: '400', height: '400' }), ' ']), ' ']),                        
                
                    el( InspectorControls, {},
                        [
                            
                        pgMediaImageControl('image_1', setAttributes, props, 'thumbnail', true, 'Image 1', '' ),
                                        
                        pgMediaImageControl('image_2', setAttributes, props, 'thumbnail', true, 'Image 2', '' ),
                                        
                        pgMediaImageControl('image_3', setAttributes, props, 'thumbnail', true, 'Image 3', '' ),
                                        
                        pgMediaImageControl('image_4', setAttributes, props, 'thumbnail', true, 'Image 4', '' ),
                                        
                        pgMediaImageControl('image_5', setAttributes, props, 'thumbnail', true, 'Image 5', '' ),
                                        
                        pgMediaImageControl('image_6', setAttributes, props, 'thumbnail', true, 'Image 6', '' ),
                                        
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
