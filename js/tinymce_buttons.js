(function() {
    tinymce.PluginManager.add('buttonshrtcd', function( editor, url ) {
        editor.addButton( 'buttonshrtcd', {
            text: tinyMCE_object.button_name,
            icon: false,
            onclick: function() {
                editor.windowManager.open( {
                    title: tinyMCE_object.button_title,
                    body: [
                        {
                            type: 'textbox',
                            name: 'text',
                            label: 'Button Text:',
                            value: '',
                            classes: 'my_input_text',
                        },
                        {
                            type: 'textbox',
                            name: 'url',
                            label: 'URL to link to:',
                            value: '',
                            classes: 'my_input_url',
                        },
                        {
                            type   : 'listbox',
                            name   : 'target',
                            label  : 'target',
                            values : [
                                { text: 'Same Tab', value: '_self' },
                                { text: 'New Tab', value: '_blank' }
                            ],
                            value : '_self' // Sets the default
                        }
                    ],
                    onsubmit: function( e ) {
                        editor.insertContent( '[button text="' + e.data.text + '" url="' + e.data.url + '" target="' + e.data.target + '"]');
                    }
                });
            },
        });
    });

})();