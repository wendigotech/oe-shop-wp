
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
    
    const block = registerBlockType( 'oe-shop/shop-product-list', {
        apiVersion: 2,
        title: 'Shop Product List',
        description: '',
        icon: 'block-default',
        category: 'shop',
        keywords: [],
        supports: {},
        attributes: {
            title: {
                type: ['string', 'null'],
                default: `Popular this Week`,
            },
            count: {
                type: ['string', 'null'],
                default: '4',
            },
            orderby: {
                type: ['string', 'null'],
                default: '',
            },
            direction: {
                type: ['string', 'null'],
                default: '',
            },
            sale: {
                type: ['string', 'null'],
                default: '',
            },
            tags: {
                type: ['string', 'null'],
                default: '',
            },
            cats: {
                type: ['string', 'null'],
                default: '',
            },
            show_ratings: {
                type: ['string', 'null'],
                default: '',
            },
            button_link: {
                type: ['object', 'null'],
                default: {post_id: 0, url: '', title: '', 'post_type': null},
            },
            button_label: {
                type: ['string', 'null'],
                default: `View More`,
            }
        },
        example: { attributes: { title: `Popular this Week`, count: '', orderby: '', direction: '', sale: '', tags: '', cats: '', show_ratings: '', button_link: {post_id: 0, url: '', title: '', 'post_type': null}, button_label: `View More` } },
        edit: function ( props ) {
            const blockProps = useBlockProps({});
            const setAttributes = props.setAttributes; 
            
            
            const innerBlocksProps = null;
            
            
            return el(Fragment, {}, [
                el('section', { ...blockProps }, [' ', el('div', { className: 'container pb-4 pt-4' }, [' ', el('div', { className: 'align-items-center row' }, [' ', el('div', { className: 'col' }, [' ', el('hr', { className: 'mb-0 mt-0' }), ' ']), ' ', el('div', { className: 'col-auto' }, [' ', el(RichText, { tagName: 'h2', className: 'fw-normal lead mb-0 text-dark', value: propOrDefault( props.attributes.title, 'title' ), onChange: function(val) { setAttributes( {title: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ']), ' ', el('div', { className: 'col' }, [' ', el('hr', { className: 'mb-0 mt-0' }), ' ']), ' ']), ' ']), ' ', el('div', { className: 'container' }, [' ', el('div', { className: 'justify-content-center row' }, [' ', el('div', { className: 'col-6 col-lg-3 col-md-4 pb-3 pt-3', 'data-pg-name': 'Repeated Item' }, [' ', el('div', { className: 'position-relative' }, [' ', el('a', { href: '#', className: 'd-block mb-3' }, el('img', { src: 'https://images.unsplash.com/photo-1598403031688-e7cfd2c222c4?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDM2NXx8dCUyMHNoaXJ0fGVufDB8fHw&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=500&h=700&fit=crop', className: 'img-fluid w-100', alt: 'Product image', width: '500', height: '700' })), el('a', { href: '#', className: 'd-inline-block link-secondary mb-2 small text-decoration-none' }, 'Armani'), el('a', { href: '#', className: 'link-dark text-decoration-none' }, el('h3', { className: 'h6' }, 'Borgonuovo T-shirt in viscose jersey')), ' ', el('div', { className: '' }, [el('s', { className: 'me-2' }, '$ 95'), el('span', { className: 'h6 text-danger' }, '$ 75'), ' ']), ' ', props.attributes.show_ratings && el('div', { className: 'mb-3' }, [' ', el('span', { className: 'me-2 text-warning' }, [el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', fill: 'currentColor', width: '1.125em', height: '1.125em', 'data-pg-name': 'Active Star' }, [' ', el('g', {}, [' ', el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), ' ', el('path', { d: 'M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928z' }), ' ']), ' ']), el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', fill: 'currentColor', width: '1.125em', height: '1.125em' }, [' ', el('g', {}, [' ', el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), ' ', el('path', { d: 'M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928z' }), ' ']), ' ']), el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', fill: 'currentColor', width: '1.125em', height: '1.125em' }, [' ', el('g', {}, [' ', el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), ' ', el('path', { d: 'M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928z' }), ' ']), ' ']), el('svg', { xmlns: 'http://www.w3.org/2000/svg', viewBox: '0 0 24 24', fill: 'currentColor', width: '1.125em', height: '1.125em', 'data-pg-name': 'Partial Star' }, [' ', el('g', {}, [' ', el('path', { fill: 'none', d: 'M0 0h24v24H0z' }), ' ', el('path', { d: 'M12 15.968l4.247 2.377-.949-4.773 3.573-3.305-4.833-.573L12 5.275v10.693zm0 2.292l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928L12 18.26z' }), ' ']), ' '])]), ' ', el('a', { href: '#', className: 'link-secondary', 'data-pg-name': 'Reviews Count' }, '21 customer review'), ' ']), ' ', el('div', { className: 'bg-danger fw-bold opacity-85 pb-2 pe-3 position-absolute ps-3 pt-2 rounded-end text-white', style: { top: '50px',left: '0' } }, ['– ', el('span', {}, '10 %'), ' ']), ' ']), ' ']), ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ']), ' ', props.attributes.button_link && props.attributes.button_link.url && el('div', { className: 'pb-4 pt-4 text-center' }, [' ', el(RichText, { tagName: 'a', href: propOrDefault( props.attributes.button_link.url, 'button_link', 'url' ), className: 'btn btn-dark pb-2 ps-4 pe-4 pt-2', onClick: function(e) { e.preventDefault(); }, value: propOrDefault( props.attributes.button_label, 'button_label' ), onChange: function(val) { setAttributes( {button_label: val }) }, withoutInteractiveFormatting: true, allowedFormats: [] }), ' ']), ' ']), ' ']),                        
                
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
                                    el(SelectControl, {
                                        value: props.attributes.count,
                                        label: __( 'How many products to show?' ),
                                        onChange: function(val) { setAttributes({count: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: '1', label: '1' },
                                            { value: '2', label: '2' },
                                            { value: '3', label: '3' },
                                            { value: '4', label: '4' },
                                            { value: '5', label: '5' },
                                            { value: '6', label: '6' },
                                            { value: '7', label: '7' },
                                            { value: '8', label: '8' },
                                            { value: '9', label: '9' },
                                            { value: '10', label: '10' },
                                            { value: '11', label: '11' },
                                            { value: '12', label: '12' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.orderby,
                                        label: __( 'Order by' ),
                                        onChange: function(val) { setAttributes({orderby: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'name', label: 'Slug' },
                                            { value: 'title', label: 'Title' },
                                            { value: 'price', label: 'Price' },
                                            { value: 'rating', label: 'Average rating' },
                                            { value: 'review_count', label: 'Review count' },
                                            { value: 'total_sales', label: 'Total sales' },
                                            { value: 'date', label: 'Date' },
                                            { value: 'modified', label: 'Modified date' },
                                            { value: 'ID', label: 'Id' },
                                            { value: 'description', label: 'Description' },
                                            { value: 'comment_count', label: 'Comment count' },
                                            { value: 'menu_order', label: 'Menu order' },
                                            { value: 'meta_value', label: 'Meta value' },
                                            { value: 'meta_value_num', label: 'Meta value numeric' },
                                            { value: 'rand', label: 'Random' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.direction,
                                        label: __( 'Order direction' ),
                                        onChange: function(val) { setAttributes({direction: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'asc', label: 'Ascending' },
                                            { value: 'desc', label: 'Descending' }
                                        ]
                                    }),
                                    el(SelectControl, {
                                        value: props.attributes.sale,
                                        label: __( 'On sale' ),
                                        onChange: function(val) { setAttributes({sale: val}) },
                                        options: [
                                            { value: '', label: '-' },
                                            { value: 'true', label: 'Yes' },
                                            { value: 'false', label: 'No' }
                                        ]
                                    }),
                                    el(TextControl, {
                                        value: props.attributes.tags,
                                        help: __( 'List tags...' ),
                                        label: __( 'Product tags' ),
                                        onChange: function(val) { setAttributes({tags: val}) },
                                        type: 'text'
                                    }),
                                    el(TextControl, {
                                        value: props.attributes.cats,
                                        help: __( 'List categories...' ),
                                        label: __( 'Product categories' ),
                                        onChange: function(val) { setAttributes({cats: val}) },
                                        type: 'text'
                                    }),
                                    el(ToggleControl, {
                                        checked: props.attributes.show_ratings === '1',
                                        label: __( 'Show ratings' ),
                                        onChange: function(val) { setAttributes({show_ratings: val ? '1' : ''}) },
                                        help: __( '' ),
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
