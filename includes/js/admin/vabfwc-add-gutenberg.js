jQuery(function($){
"use strict";
//array name form
var arrayName = [ vabfwc_local.selectformname ],
		arrayTag=['','h1','h2','h3','h4','h5','h6','div','p','center'];
$('#vabfwc_name_form').find('label span').each(function(){
    let idForm = $(this).closest('label').prev('input').attr('data-id'),
				thishtml = $(this).html() !== '' ? $(this).html() : vabfwc_local.selectformname + ' ' + idForm + ' ' + vabfwc_local.emptyformname,
				value =  idForm + '|' + thishtml ;
    arrayName.push( value );
});
function idAttribute(value, name) {
    var idForm = value;
    let nameForm = name;
    arrayName.map(function(value) {
        let id = value;
        let arrayNamePlusID = '';
        if ( value.match(/\|/g) ) {
            arrayNamePlusID = value.split('|');
            id = arrayNamePlusID[1];
        }
        if ( id == nameForm ){
            idForm = arrayNamePlusID[0];
        }
    });
    return idForm;
}
//custom block in gutenberg
( function( blocks, element ) {
    const el = element.createElement;
    const { registerBlockType } = blocks;
    registerBlockType( 'vabfwc-form/custom-block', {
        title: 'Forms with chart from VAB',
       	icon:{background:'#fff',foreground:'#0374A0',src:'wordpress',},//schedule wordpress
				category:'vabfwc_category',
        keywords: [ 'email', 'subscribe', 'misha' ],
        attributes: {
            nameform: {
				type: 'string',
				default: vabfwc_local.selectformname
			},
			form_id: {
				type: 'string',
				default: ''
			},
			form_class: {
				type: 'string',
				default: ''
			},
			id: {
				type: 'string',
				default: ''
			}
		},
		edit: function( props ) {
			const { attributes: { nameform, form_id, form_class, id  }, className, setAttributes } = props;
            return (
                el( 'div', { className: props.className },
                    el( 'div', { className: 'swap-add-vabfwc-form' },
											el( 'div', { className: 'heading-add-vabfwc-form' }, 'Forms with chart from VAB'),
											el( 'div', { className: 'block-add-vabfwc-form name-vabfwc-form' },
												el( 'div', { className: 'text-add-vabfwc-form' }, vabfwc_local.selectform ),
												el( 'div', { className: 'swap-select-vabfwc-form' },
													el( 'select', {  className: 'select-add-vabfwc-form', 'value':props.attributes.nameform,  onChange: function(value) { props.setAttributes({ nameform: event.target.value }) }, },
														//array name form
														arrayName.map(function( valueThis ) {
															let optionText = valueThis;
															if ( valueThis.match(/\|/g) ) {
																valueThis = valueThis.split('|');
																optionText = valueThis[1];
															}
															return el( 'option', {value: optionText}, optionText  );
														})
													)
												)
											),
											el( 'div', { className: 'block-add-vabfwc-form button-text-vabfwc-form' },
												el( 'div', { className: 'text-add-vabfwc-form' }, vabfwc_local.idtoform ),
												el( 'div', { className: 'swap-select-vabfwc-form' },
													el( 'input', { placeholder: vabfwc_local.textforid, 'size':44, 'value':props.attributes.form_id, type: 'text' , className: 'select-add-vabfwc-form' ,
														onChange:  function(value) {
															props.setAttributes({ form_id: event.target.value });
														}
													})
												)
											),
											el( 'div', { className: 'block-add-vabfwc-form button-text-vabfwc-form' },
												el( 'div', { className: 'text-add-vabfwc-form' }, vabfwc_local.classtoform ),
												el( 'div', { className: 'swap-select-vabfwc-form' },
													el( 'input', { placeholder: vabfwc_local.textforclass, 'size':44, 'value':props.attributes.form_class, type: 'text' , className: 'select-add-vabfwc-form' ,
														onChange:  function(value) {
															props.setAttributes({ form_class: event.target.value });
														}
													})
												)
											),
											el( 'div', { className: 'block-add-vabfwc-form' },
												el( 'input', {
													placeholder: '',
													'value': idAttribute(props.attributes.id, props.attributes.nameform ), type: 'hidden' , className: 'select-add-vabfwc-form' },
													props.setAttributes({ id: idAttribute(props.attributes.id, props.attributes.nameform ) })
												)
											),
                    )
                )
            );

        },
        save: function( props ) {
            let nameForm = props.attributes.nameform ;
            let form_id = props.attributes.form_id;
            let form_class = props.attributes.form_class;
            let idForm = idAttribute(props.attributes.id, props.attributes.nameform );
            let string ='[VABFWC id="'+idForm+'" form_id="'+form_id+'" form_class="'+form_class+'" ]';
            return (
                el( 'div', { className: props.className }, string
                )
            );
        },
    });
})
(
	window.wp.blocks,
	window.wp.element
);
////////////////////////////////////////////
( function( blocks, element ) {
    const el = element.createElement;
    const { registerBlockType } = blocks;
    registerBlockType( 'vabfwc-chart/custom-block', {
        title: vabfwc_local.chartsshort,
       	icon:{background:'#fff',foreground:'#0374A0',src:'wordpress',},
				category:'vabfwc_category',
        keywords: [ 'email', 'subscribe', 'misha' ],
        attributes: {
            nameform: {
				type: 'string',
				default: vabfwc_local.selectformname
			},
			form_title: {
				type: 'string',
				default: ''
			},
			form_tag: {
				type: 'string',
				default: ''
			},
			form_class: {
				type: 'string',
				default: ''
			},
			id: {
				type: 'string',
				default: ''
			}
		},
		edit: function( props ) {
			const { attributes: { nameform, form_title, form_tag, form_class, id  }, className, setAttributes } = props;
            return (
                el( 'div', { className: props.className },
                    el( 'div', { className: 'swap-add-vabfwc-form' },
											el( 'div', { className: 'heading-add-vabfwc-form' }, 'Forms with chart from VAB'),
											el( 'div', { className: 'block-add-vabfwc-form name-vabfwc-form' },
												el( 'div', { className: 'text-add-vabfwc-form' }, vabfwc_local.selectform ),
												el( 'div', { className: 'swap-select-vabfwc-form' },
													el( 'select', {  className: 'select-add-vabfwc-form', 'value':props.attributes.nameform,  onChange: function(value) { props.setAttributes({ nameform: event.target.value }) }, },
														arrayName.map(function( valueThis ) {
															let optionText = valueThis;
															if ( valueThis.match(/\|/g) ) {
																valueThis = valueThis.split('|');
																optionText = valueThis[1];
															}
															return el( 'option', {value: optionText}, optionText  );
														})
													)
												)
											),
											el( 'div', { className: 'block-add-vabfwc-form button-text-vabfwc-form' },
												el( 'div', { className: 'text-add-vabfwc-form' }, vabfwc_local.formtitle ),
												el( 'div', { className: 'swap-select-vabfwc-form' },
													el( 'input', { placeholder: vabfwc_local.textfortitle, 'size':44, 'value':props.attributes.form_title, type: 'text' , className: 'select-add-vabfwc-form' ,
														onChange:  function(value) {
															props.setAttributes({ form_title: event.target.value });
														}
													})
												)
											),
											el( 'div', { className: 'block-add-vabfwc-form button-text-vabfwc-form' },
												el( 'div', { className: 'text-add-vabfwc-form' }, vabfwc_local.formtag + ' ( ' + vabfwc_local.texttagfortitle + ' ) ' ),
												el( 'div', { className: 'swap-select-vabfwc-form' },
													el( 'select', {  className: 'select-add-vabfwc-form', 'value':props.attributes.form_tag,  onChange: function(value) { props.setAttributes({ form_tag: event.target.value }) }, },
														arrayTag.map(function( valueThis ) {
															let optionText = valueThis;
															if ( valueThis.match(/\|/g) ) {
																valueThis = valueThis.split('|');
																optionText = valueThis[1];
															}
															return el( 'option', {value: optionText}, optionText  );
														})
													)
												)
											),
											el( 'div', { className: 'block-add-vabfwc-form button-text-vabfwc-form' },
												el( 'div', { className: 'text-add-vabfwc-form' }, vabfwc_local.classtotag ),
												el( 'div', { className: 'swap-select-vabfwc-form' },
													el( 'input', { placeholder: vabfwc_local.textclassfortag, 'size':44, 'value':props.attributes.form_class, type: 'text' , className: 'select-add-vabfwc-form',
														onChange:  function(value) {
															props.setAttributes({ form_class: event.target.value });
														}
													})
												)
											),
											el( 'div', { className: 'block-add-vabfwc-form' },
												el( 'input', {
													placeholder: '',
													'value': idAttribute(props.attributes.id, props.attributes.nameform ), type: 'hidden' , className: 'select-add-vabfwc-form' },
													props.setAttributes({ id: idAttribute(props.attributes.id, props.attributes.nameform ) })
												)
											),
                    )
                )
            );

        },
        save: function( props ) {
            let nameForm = props.attributes.nameform ;
            let form_title = props.attributes.form_title;
            let form_tag = props.attributes.form_tag;
            let form_class = props.attributes.form_class;
            let idForm = idAttribute(props.attributes.id, props.attributes.nameform );
            let string ='[VABFWC_Graphic id="'+idForm+'" title="'+form_title+'" tag="'+form_tag+'" class="'+form_class+'" ]';
            return (
                el( 'div', { className: props.className }, string
                )
            );
        },
    });
})
(
	window.wp.blocks,
	window.wp.element
);
});