// closure to avoid namespace collision
/*
 * ALERT BUTTON
 */
(function() {
    tinymce.create('tinymce.plugins.alert', {
        init: function(ed, url) {
            ed.addButton('alert', {
                title: 'Alert',
                image: url + '/alert-ico.png',
                onclick: function() {

                    alert_form();
                    jQuery('.wpb_bootstrap_modals').css('z-index', '100');
                    jQuery('div.modal').css('z-index', '101');
                    jQuery('.modal-backdrop').css('z-index', '100');

                    tb_show('Alert | Webnus theme shortcode manager', '#TB_inline?width=900&inlineId=alert-form');
                    jQuery('#TB_window').center();
                    jQuery('#TB_window').css('height', '250');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('alert', tinymce.plugins.alert);



    function alert_form()
    {

        // creates a form to be displayed everytime the button is clicked
        // you should achieve this using AJAX instead of direct html code like this

        /*
         * 
         * <tr>\
         <th><label for="testimonial-form-title">Title</label></th>\
         <td><input type="text" name="testimonial-form-title" id="testimonial-form-title" value="Title"  /><br />\
         <small>Specify the Testimonial Title.</small>\
         </tr>\
         */

        var form = jQuery('<div id="alert-form"><table id="alert-table" class="form-table">\
                <tr>\
                <th><label for="alert-form-type">Type</label></th>\
                <td><select  name="alert-form-type" id="alert-form-type">\
                <option value="info">Info</option><option value="success">Success</option><option value="warning">Warning</option><option value="danger">Danger</option></select><br />\
                <small>Alert Type</small>\
                </tr>\
                <tr>\
                <th><label for="alert-form-close">Close Button</label></th>\
                <td><input type="checkbox" name="alert-form-close" id="alert-form-close" value="yes"   /><br />\
                <small>Has Close Button?</small>\
                </tr>\
                </table>\
                <p class="submit">\
                <input type="button" id="alert-form-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
                </p>\
                </div>');

        var table = form.find('table');
        form.appendTo('body').hide();


        form.find('#alert-form-submit').click(function() {
            var type = table.find("#alert-form-type").val();
            if(table.find("#alert-form-close:checked").attr('checked'))
            var close = 'true';
            else
            var close = 'false';
            

            var shortcode = '[alert type="' + type + '" close="' + close + '"]Content Text[/alert]';



            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

            // closes Thickbox
            tb_remove();
        });

    }
})(jQuery);



    
/*
 * BUTTON
 */
(function() {
    tinymce.create('tinymce.plugins.easyweb_webnus_button', {
        init: function(ed, url) {
            ed.addButton('easyweb_webnus_button', {
                title: 'Button',
                image: url + '/button-ico.png',
                onclick: function() {
                    jQuery('.wpb_bootstrap_modals').css('z-index', '100');
                    jQuery('div.modal').css('z-index', '101');
                    jQuery('.modal-backdrop').css('z-index', '100');


                    button_form();
                    tb_show('Button | Webnus theme shortcode manager', '#TB_inline?width=700&inlineId=button-form');

                    jQuery('#TB_ajaxContent').css('height', 660);
                    jQuery('#TB_window').css('height', 660);
                    jQuery('#TB_window').center();

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('easyweb_webnus_button', tinymce.plugins.easyweb_webnus_button);


    function button_form()
    {

        // creates a form to be displayed everytime the button is clicked
        // you should achieve this using AJAX instead of direct html code like this
        var form = jQuery('<div id="button-form"><table id="button-table" class="form-table">\
                <tr>\
                    <th><label for="button-form-url">URL</label></th>\
                    <td><input type="text" name="button-form-url" id="button-form-url" value="http://"  /><br />\
                    <small>Specify the Button URL.</small>\
                </tr>\
                <tr>\
                    <th><label for="button-form-target">Target</label></th>\
                    <td><select id="button-form-target"><option value="_blank">Blank</option><option value="_self">Self</option><option value="_parent">Parent</option><option value="_top">Top</option></select><br />\
                    <small>Specify the Button Target.</small></td>\
                </tr>\
                <tr>\
                    <th><label for="button-form-color">Color</label></th>\
                    <td><select id="button-form-color"><option value="green">Green</option><option value="red">Red</option><option value="blue">Blue</option><option value="gray">Gray</option><option value="cherry">Cherry</option><option value="orchid">Orchid</option><option value="pink">Pink</option><option value="orange">Orange</option><option value="teal">Teal</option><option value="skyblue">Skyblue</option><option value="jade">Jade</option></select><br />\
                    <small>Specify the Button Color.</small></td>\
                </tr>\
                <tr>\
                    <th><label for="button-form-size">Size</label></th>\
                    <td><select id="button-form-size"><option value="medium">Medium</option><option value="small">Small</option><option value="large">Large</option></select><br />\
                    <small>Specify the Button Target.</small></td>\
                </tr>\
                <tr>\
                    <th><label for="button-form-border">Border</label></th>\
                    <td><select id="button-form-border"><option value="false">Normal</option><option value="true">Bordered</option><br />\
                    <small>Specify the Border Type.</small></td>\
                </tr>\
                <tr>\
                    <th><label for="button-form-icon">Icon</label></th>\
                    <td><input type="text" name="button-form-icon" id="button-form-icon" value=""  /><br />\
                    <small>Specify the Button Icon.</small>\
                </tr>\
                <tr>\
                    <th><label for="button-form-text">Text</label></th>\
                    <td><input type="text" name="button-form-text" id="button-form-text" value="Button Text"  /><br />\
                    <small>Specify the Button Target.</small></td>\
                </tr>\
                </table>\
                <p class="submit">\
                <input type="button" id="button-form-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
                </p>\
                </div>');

        var table = form.find('table');
        form.appendTo('body').hide();

        // handles the click event of the submit button
        form.find('#button-form-submit').click(function() {
            // defines the options and their default values
            // again, this is not the most elegant way to do this
            // but well, this gets the job done nonetheless
            var button_form_url = table.find("#button-form-url").val();
            var button_form_target = table.find("#button-form-target option:selected").val();
            var button_form_color = table.find("#button-form-color option:selected").val();
            var button_form_size = table.find("#button-form-size option:selected").val();
            var button_form_text = table.find("#button-form-text").val();
            var button_form_border = table.find("#button-form-border").val();
            var button_form_icon = table.find("#button-form-icon").val();





            var shortcode = '[button url="' + button_form_url + '" target="' + button_form_target + '" color="' + button_form_color + '" size="' + button_form_size + '" border="' + button_form_border + '" icon="' + button_form_icon +  '"]'+button_form_text+'[/button]';
            // inserts the shortcode into the active editor

            if (tinyMCE.activeEditor.selection.getContent() != '') {
                tinyMCE.activeEditor.selection.setContent('[button url="' + button_form_url + '" target="' + button_form_target + '" color="' + button_form_color + '" size="' + button_form_size + '" border="' + button_form_border + '" icon="' + button_form_icon + '"]' + tinyMCE.activeEditor.selection.getContent() + '[/button]');
            } else
                tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

            // closes Thickbox
            tb_remove();
        });

    }


})(jQuery);





/*
 * Highlight
 */
(function() {
    tinymce.create('tinymce.plugins.highlight', {
        init: function(ed, url) {
            ed.addButton('highlight', {
                title: 'Highlight',
                image: url + '/highlight-ico.png',
                onclick: function() {
                    jQuery('.wpb_bootstrap_modals').css('z-index', '100');
                    jQuery('div.modal').css('z-index', '101');
                    jQuery('.modal-backdrop').css('z-index', '100');


                    highlight_form();
                    tb_show('Highlight | Webnus theme shortcode manager', '#TB_inline?width=700&inlineId=highlight-form');
                    jQuery('#TB_window').css('height', 150);
                    jQuery('#TB_window').center();

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('highlight', tinymce.plugins.highlight);



    function highlight_form()
    {

        // creates a form to be displayed everytime the button is clicked
        // you should achieve this using AJAX instead of direct html code like this
        var form = jQuery('<div id="highlight-form"><table id="highlight-table" class="form-table">\
                <tr>\
                    <th><label for="highlight-form-no">Highlight</label></th>\
                    <td><select id="highlight-form-no"><option value="highlight1">Highlight 1</option><option value="highlight2">Highlight 2</option><option value="highlight3">Highlight 3</option><option value="highlight4">Highlight 4</option></select><br />\
                    <small>Specify the Highlight.</small></td>\
                </tr>\
                </table>\
                <p class="submit">\
                <input type="button" id="highlight-form-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
                </p>\
                </div>');

        var table = form.find('table');
        form.appendTo('body').hide();


        form.find('#highlight-form-submit').click(function() {
            var highlight_form_no = table.find("#highlight-form-no option:selected").val();

            var shortcode = '[' + highlight_form_no + ']Default Highlight Text[/' + highlight_form_no + ']';


            if (tinyMCE.activeEditor.selection.getContent() != '') {
                tinyMCE.activeEditor.selection.setContent('[' + highlight_form_no + ']' + tinyMCE.activeEditor.selection.getContent() + '[/' + highlight_form_no + ']');
            } else
                tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

            // closes Thickbox
            tb_remove();
        });

    }



})(jQuery);





/*
 * List
 */
(function() {
    tinymce.create('tinymce.plugins.list', {
        init: function(ed, url) {
            ed.addButton('list', {
                title: 'List',
                image: url + '/list-ico.png',
                onclick: function() {
                    jQuery('.wpb_bootstrap_modals').css('z-index', '100');
                    jQuery('div.modal').css('z-index', '101');
                    jQuery('.modal-backdrop').css('z-index', '100');


                    list_form();
                    tb_show('List | Webnus theme shortcode manager', '#TB_inline?width=700&inlineId=list-form');
                    jQuery('#TB_window').css('height', 150);
                    jQuery('#TB_window').center();

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('list', tinymce.plugins.list);

    function list_form()
    {

        // creates a form to be displayed everytime the button is clicked
        // you should achieve this using AJAX instead of direct html code like this
        var form = jQuery('<div id="list-form"><table id="list-table" class="form-table">\
                <tr>\
                    <th><label for="list-form-type">List Types</label></th>\
                    <td><select id="list-form-type"><option value="check">Check</option><option value="plus">Plus</option><option value="minus">Minus</option><option value="star">Star</option><option value="arrow">Arrow</option><option value="arrow2">Arrow 2</option><option value="square">Square</option><option value="circle">Circle</option><option value="cross">Cross</option></select><br />\
                    <small>List type attributes.</small></td>\
                </tr>\
                </table>\
                <p class="submit">\
                <input type="button" id="list-form-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
                </p>\
                </div>');

        var table = form.find('table');
        form.appendTo('body').hide();


        form.find('#list-form-submit').click(function() {
            var list_form_type = table.find("#list-form-type option:selected").val();

            var shortcode = '[list-ul type="' + list_form_type + '"][li-row]Defalt List Item 1[/li-row][li-row]Defalt List Item 2[/li-row][/list-ul]';


            if (tinyMCE.activeEditor.selection.getContent() != '') {
                tinyMCE.activeEditor.selection.setContent('[list-ul type="' + list_form_type + '"][li-row]' + tinyMCE.activeEditor.selection.getContent() + '[/li-row][/list-ul]');
            } else
                tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

            // closes Thickbox
            tb_remove();
        });

    }



})(jQuery);

/*
 * Clear Shortcode
 */

(function() {
    tinymce.create('tinymce.plugins.clear', {
        init: function(ed, url) {
            ed.addButton('clear', {
                title: 'Clear',
                image: url + '/clear-ico.png',
                onclick: function() {

                    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[clear]');

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('clear', tinymce.plugins.clear);
})(jQuery);




/*
 * Line Shortcode
 */

(function() {
    tinymce.create('tinymce.plugins.line', {
        init: function(ed, url) {
            ed.addButton('line', {
                title: 'Line',
                image: url + '/separator-ico.png',
                onclick: function() {
                    jQuery('.wpb_bootstrap_modals').css('z-index', '100');
                    jQuery('div.modal').css('z-index', '101');
                    jQuery('.modal-backdrop').css('z-index', '100');


                     line_form();
                    
                    tb_show('Line | Webnus theme shortcode manager', '#TB_inline?width=700&inlineId=line-form');

                    jQuery('#TB_window').css('height', 150);
                    jQuery('#TB_window').css('width', 400);
                    
                    jQuery('#TB_window').center();

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('line', tinymce.plugins.line);


 function line_form() //Line
    {

        // creates a form to be displayed everytime the button is clicked
        // you should achieve this using AJAX instead of direct html code like this
        var form = jQuery('<div id="line-form"><table id="line-table" class="form-table">\
                <tr>\
                    <th><label for="line-type">Type</label></th>\
                    <td><select id="line-type"><option value="1">Line</option><option value="2">Thick Line</option></select><br />\
                    <small>Line Type</small>\
                    </tr></table>\
                <p class="submit">\
                <input type="button" id="line-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
                </p>\
                </div>');

        var table = form.find('table');
        form.appendTo('body').hide();

        // handles the click event of the submit button
        form.find('#line-submit').click(function() {

            var line_type = table.find("#line-type option:selected").val();
            
            var shortcode='';
            if(line_type==1)
                shortcode = '[line]';
            else
                shortcode = '[tline]';
            

            
            // inserts the shortcode into the active editor


            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

            // closes Thickbox
            tb_remove();
        });

    }

    
})(jQuery);





/*
 * Tab
 */
(function() {
    tinymce.create('tinymce.plugins.tab', {
        init: function(ed, url) {
            ed.addButton('tab', {
                title: 'Tab',
                image: url + '/tab-ico.png',
                onclick: function() {
                    jQuery('.wpb_bootstrap_modals').css('z-index', '100');
                    jQuery('div.modal').css('z-index', '101');
                    jQuery('.modal-backdrop').css('z-index', '100');


                    tab_form();
                    tb_show('Tab | Webnus theme shortcode manager', '#TB_inline?width=700&inlineId=tab-form');

                    jQuery('#TB_window').center();

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('tab', tinymce.plugins.tab);

    function tab_form()
    {

        // creates a form to be displayed everytime the button is clicked
        // you should achieve this using AJAX instead of direct html code like this
        var form = jQuery('<div id="tab-form"><table id="tab-table" class="form-table">\
                <tr>\
                    <td><label for="tab-form-title">Tab ID</label></td>\
                    <td><input type="text" id[]="tab-form-title" name[]="tab-form-title" value="Tab1" class="tab-form-title"/>Is default? &nbsp; <input type="checkbox" id="tab-form-active[]" name="tab-form_active[]" value="1" class="tab-form-active"/><br />\
                    <small>Tab title attribute.</small></td>\
                </tr>\
                <tr>\
                    <td><input type="button" id="add-tab" class="button-primary" value="Add Tab" name="submit" /></td>\
                    <td></td>\
                </tr>\
                </table>\
                <p class="submit">\
                <input type="button" id="tab-form-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
                </p>\
                </div>');

        var table = form.find('table');
        form.appendTo('body').hide();

        var new_tr = '<tr><td><label for="tab-form-title">Tab ID</label></td>\
                    <td><input type="text" id[]="tab-form-title" name[]="tab-form-title" value="Tab ID" class="tab-form-title"/>Is default? &nbsp; <input type="checkbox" id="tab-form-active[]" name="tab-form_active[]" value="1" class="tab-form-active"/><br />\
                    <small>Tab ID attribute.</small></td>\
                </tr>\ ';


        form.find('#add-tab').click(function() {


            table.find("tr:last").before(new_tr);

        });


        form.find('#tab-form-submit').click(function() {

            var tab_title = [];
            var tab_active = [];
            table.find('input[type=text]').each(function(i, e) {

                tab_title.push(this.value);

                if (jQuery(this).closest('tr').find(':checkbox').attr('checked'))
                    tab_active.push(true);
                else
                    tab_active.push(false);

            });

            var tabgroup = "[tabgroup]";
            for (i = 0; i < tab_title.length; i++)
            {

                if (tab_active[i])
                    tabgroup += '[tab title="' + tab_title[i] + '" state="active"] Content of Tab  [/tab]';
                else
                    tabgroup += '[tab title="' + tab_title[i] + '"] Content of Tab  [/tab]';
            }
            tabgroup += "[/tabgroup]";



            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, tabgroup);



            //alert(tabgroup);
            // closes Thickbox
            tb_remove();
        });


        jQuery('.tab-form-active').live("click", function() {

            //table.find('input[type=text]').each(function(i,e){
            jQuery('.tab-form-active').removeAttr('checked');

            jQuery(this).attr('checked', 'checked');


            // closes Thickbox
            //tb_remove();
        });
        //end live

    }



})(jQuery);



/*
 * Left Tab
 */
(function() {
    tinymce.create('tinymce.plugins.lefttab', {
        init: function(ed, url) {
            ed.addButton('lefttab', {
                title: 'Left Tab',
                image: url + '/leftnav-ico.png',
                onclick: function() {
                    jQuery('.wpb_bootstrap_modals').css('z-index', '100');
                    jQuery('div.modal').css('z-index', '101');
                    jQuery('.modal-backdrop').css('z-index', '100');


                    navtab_form();
                    tb_show('Left Tab | Webnus theme shortcode manager', '#TB_inline?width=700&inlineId=navtab-form');

                    jQuery('#TB_window').center();


                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('lefttab', tinymce.plugins.lefttab);



    function navtab_form()
    {

        // creates a form to be displayed everytime the button is clicked
        // you should achieve this using AJAX instead of direct html code like this
        var form = jQuery('<div id="navtab-form"><table id="navtab-table" class="form-table">\
                <tr>\
                    <td><label for="tab-form-title">Tab ID</label></td>\
                    <td><input type="text" id[]="tab-form-title" name[]="tab-form-title" value="Tab1" class="tab-form-title"/>Is default? &nbsp; <input type="checkbox" id="tab-form-active[]" name="tab-form_active[]" value="1" class="tab-form-active"/><br />\
                    <small>Tab title attribute.</small></td>\
                </tr>\
                <tr>\
                    <td><input type="button" id="add-tab" class="button-primary" value="Add Tab" name="submit" /></td>\
                    <td></td>\
                </tr>\
                </table>\
                <p class="submit">\
                <input type="button" id="tab-form-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
                </p>\
                </div>');

        var table = form.find('table');
        form.appendTo('body').hide();

        var new_tr = '<tr><td><label for="tab-form-title">Tab ID</label></td>\
                    <td><input type="text" id[]="tab-form-title" name[]="tab-form-title" value="Tab1" class="tab-form-title"/>Is default? &nbsp; <input type="checkbox" id="tab-form-active[]" name="tab-form_active[]" value="1" class="tab-form-active"/><br />\
                    <small>Tab ID attribute.</small></td>\
                </tr>\ ';


        form.find('#add-tab').click(function() {


            table.find("tr:last").before(new_tr);

        });


        form.find('#tab-form-submit').click(function() {

            var tab_title = [];
            var tab_active = [];
            table.find('input[type=text]').each(function(i, e) {

                tab_title.push(this.value);

                if (jQuery(this).closest('tr').find(':checkbox').attr('checked'))
                    tab_active.push(true);
                else
                    tab_active.push(false);

            });

            var tabgroup = "[lefttab]";
            for (i = 0; i < tab_title.length; i++)
            {

                if (tab_active[i])
                    tabgroup += '[tab title="' + tab_title[i] + '" state="active"] Content of Tab  [/tab]';
                else
                    tabgroup += '[tab title="' + tab_title[i] + '"] Content of Tab  [/tab]';
            }
            tabgroup += "[/lefttab]";



            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, tabgroup);



            //alert(tabgroup);
            // closes Thickbox
            tb_remove();
        });


        jQuery('.tab-form-active').live("click", function() {

            //table.find('input[type=text]').each(function(i,e){
            jQuery('.tab-form-active').removeAttr('checked');

            jQuery(this).attr('checked', 'checked');


            // closes Thickbox
            //tb_remove();
        });
        //end live

    }




})(jQuery);



/*
 * Accordion Shortcode
 */

(function() {
    tinymce.create('tinymce.plugins.accordion', {
        init: function(ed, url) {
            ed.addButton('accordion', {
                title: 'Accordion',
                image: url + '/accordion-ico.png',
                onclick: function() {

                    tinyMCE.activeEditor.selection.setContent('[accordion title="Accordion title"]' + tinyMCE.activeEditor.selection.getContent() + '[/accordion]');

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('accordion', tinymce.plugins.accordion);
})(jQuery);






/*
 * Progress Bar
 */
(function() {
    tinymce.create('tinymce.plugins.progressbar', {
        init: function(ed, url) {
            ed.addButton('progressbar', {
                title: 'ProgressBar',
                image: url + '/progress-ico.png',
                onclick: function() {
                    jQuery('.wpb_bootstrap_modals').css('z-index', '100');
                    jQuery('div.modal').css('z-index', '101');
                    jQuery('.modal-backdrop').css('z-index', '100');


                    progressbar_form();
                    tb_show('ProgressBar | Webnus theme shortcode manager', '#TB_inline?width=900&inlineId=progressbar-form');
                    jQuery('#TB_window').center();
                    jQuery('#TB_window').css('height', '280');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('progressbar', tinymce.plugins.progressbar);



    function progressbar_form()
    {

        // creates a form to be displayed everytime the button is clicked
        // you should achieve this using AJAX instead of direct html code like this



        var form = jQuery('<div id="progressbar-form"><table id="progressbar-table" class="form-table">\
                <tr>\
                <th><label for="progressbar-form-type">Type</label></th>\
                <td><select  name="progressbar-form-type" id="progressbar-form-type">\
                <option value="info">Blue</option><option value="success">Green</option><option value="warning">Orange</option><option value="danger">Red</option></select><br />\
                <small>Progressbar Type</small>\
                </tr>\
                <tr>\
                <th><label for="progressbar-form-percent">Percent</label></th>\
                <td><input type="text" name="progressbar-form-percent" id="progressbar-form-percent" value="50"  /><br />\
                <small>Progressbar Percent.</small>\
                </tr>\
                <tr>\
                <th><label for="progressbar-form-text">Text</label></th>\
                <td><input type="text" name="progressbar-form-text" id="progressbar-form-text" value="Sample"  /><br />\
                <small>Progressbar Text.</small>\
                </tr>\
                </table>\
                <p class="submit">\
                <input type="button" id="progressbar-form-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
                </p>\
                </div>');

        var table = form.find('table');
        form.appendTo('body').hide();


        form.find('#progressbar-form-submit').click(function() {
            var progressbar_type = table.find("#progressbar-form-type").val();
            var progressbar_percent = table.find("#progressbar-form-percent").val();
            var progressbar_text = table.find("#progressbar-form-text").val();

            var shortcode = '[progress type="' + progressbar_type + '" percent="' + progressbar_percent + '" text="'+progressbar_text +'"]';



            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

            // closes Thickbox
            tb_remove();
        });

    }
})(jQuery);




/*
 * Flex
 */
(function() {
    tinymce.create('tinymce.plugins.flex', {
        init: function(ed, url) {
            ed.addButton('flex', {
                title: 'Flex Slider',
                image: url + '/flexslider-ico.png',
                onclick: function() {

                    tinyMCE.activeEditor.selection.setContent('[flexslider][flexitem img="" alt=""][flexitem img="" alt=""][/flexslider]');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('flex', tinymce.plugins.flex);


})(jQuery);





/*
 * CallOut
 */
(function() {
    tinymce.create('tinymce.plugins.callout', {
        init: function(ed, url) {
            ed.addButton('callout', {
                title: 'Callout (promobox)',
                image: url + '/callout-ico.png',
                onclick: function() {

                    callout_form();
                    tb_show('Callout | Webnus theme shortcode manager', '#TB_inline?width=700&inlineId=callout-form');

                    jQuery('#TB_window').css('height', 350);
                    jQuery('#TB_window').center();
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('callout', tinymce.plugins.callout);

    function callout_form() //otype [ourteam 1 or ourteam 2]
    {

        // creates a form to be displayed everytime the button is clicked
        // you should achieve this using AJAX instead of direct html code like this
        var form = jQuery('<div id="callout-form"><table id="callout-table" class="form-table">\
                <tr>\
                    <th><label for="callout-title">Title</label></th>\
                    <td><input type="text" name="callout-title" id="callout-title" value=""  /><br />\
                    <small>CallOut Title</small>\
                </tr>\
                <tr>\
                    <th><label for="callout-text">Text</label></th>\
                    <td><input type="text" name="callout-text" id="callout-text" value=""  /><br />\
                    <small>CallOut Text</small>\
                </tr>\
                                <tr>\
                    <th><label for="callout-buttontext">Button Text</label></th>\
                    <td><input type="text" name="callout-buttontext" id="callout-buttontext" value=""  /><br />\
                    <small>CallOut Button Text</small>\
                </tr>\
                                <tr>\
                    <th><label for="callout-buttonlink">Button Link</label></th>\
                    <td><input type="text" name="callout-buttonlink" id="callout-buttonlink" value=""  /><br />\
                    <small>CallOut Button Link</small>\
                </tr>\
                                </table>\
                <p class="submit">\
                <input type="button" id="callout-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
                </p>\
                </div>');
        var table = form.find('table');
        form.appendTo('body').hide();

        // handles the click event of the submit button
        form.find('#callout-submit').click(function() {

            var callout_title = table.find("#callout-title").val();
            var callout_text = table.find("#callout-text").val();
            var callout_buttontext = table.find("#callout-buttontext").val();
            var callout_buttonlink = table.find("#callout-buttonlink").val();
            var shortcode = "[callout title='" + callout_title + "' text='" + callout_text + "' button_text='" + callout_buttontext + "'  button_link='" + callout_buttonlink + "']";
            // inserts the shortcode into the active editor


            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

            // closes Thickbox
            tb_remove();
        });

    }

})(jQuery);




/*
 * 1/3
 */
(function() {
    tinymce.create('tinymce.plugins.testimonial', {
        init: function(ed, url) {
            ed.addButton('testimonial', {
                title: 'Testimonial',
                image: url + '/testimonial-ico.png',
                onclick: function() {

                    tinyMCE.activeEditor.selection.setContent('[testimonial name="" img="" subtitle=""] Contents [/testimonial]');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('testimonial', tinymce.plugins.testimonial);
})(jQuery);
/*
 * 1/3
 */
(function() {
    tinymce.create('tinymce.plugins.one_third', {
        init: function(ed, url) {
            ed.addButton('one_third', {
                title: '1/3 Columns',
                image: url + '/column13-ico.png',
                onclick: function() {

                    tinyMCE.activeEditor.selection.setContent('[one_third] Contents [/one_third]');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('one_third', tinymce.plugins.one_third);
})(jQuery);
/*
 * 2/3
 */
(function() {
    tinymce.create('tinymce.plugins.two_third', {
        init: function(ed, url) {
            ed.addButton('two_third', {
                title: '2/3 Columns',
                image: url + '/colimn23-ico.png',
                onclick: function() {

                    tinyMCE.activeEditor.selection.setContent('[two_third] Contents [/two_third]');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('two_third', tinymce.plugins.two_third);
})(jQuery);
/*
 * 1/2
 */
(function() {
    tinymce.create('tinymce.plugins.one_half', {
        init: function(ed, url) {
            ed.addButton('one_half', {
                title: '1/2 Columns',
                image: url + '/column12-ico.png',
                onclick: function() {

                    tinyMCE.activeEditor.selection.setContent('[one_half] Contents [/one_half]');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('one_half', tinymce.plugins.one_half);
})(jQuery);
/*
 * 1/4
 */
(function() {
    tinymce.create('tinymce.plugins.one_fourth', {
        init: function(ed, url) {
            ed.addButton('one_fourth', {
                title: '1/4 Columns',
                image: url + '/column14-ico.png',
                onclick: function() {

                    tinyMCE.activeEditor.selection.setContent('[one_fourth] Contents [/one_fourth]');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('one_fourth', tinymce.plugins.one_fourth);

   

})(jQuery);
/*
 * 1/6
 */
(function() {
    tinymce.create('tinymce.plugins.one_sixth', {
        init: function(ed, url) {
            ed.addButton('one_sixth', {
                title: '1/6 Columns',
                image: url + '/column16-ico.png',
                onclick: function() {

                    tinyMCE.activeEditor.selection.setContent('[one_sixth] Contents [/one_sixth]');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('one_sixth', tinymce.plugins.one_sixth);
})(jQuery);

/*
 * 1/12
 */
(function() {
    tinymce.create('tinymce.plugins.one_twelfth', {
        init: function(ed, url) {
            ed.addButton('one_twelfth', {
                title: '1/12 Columns',
                image: url + '/column112-ico.png',
                onclick: function() {

                    tinyMCE.activeEditor.selection.setContent('[one_twelfth] Contents [/one_twelfth]');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        }
    });
    tinymce.PluginManager.add('one_twelfth', tinymce.plugins.one_twelfth);
})(jQuery);

/*
 * Big Title1
 */
(function() {
    tinymce.create('tinymce.plugins.bigtitle1', {
        init: function(ed, url) {
            ed.addButton('bigtitle1', {
                title: 'Big Title 1',
                image: url + '/bigtitle-ico.png',
                onclick: function() {
                    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[big_title]Title[/big_title]');

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('bigtitle1', tinymce.plugins.bigtitle1);
})(jQuery);
/*
 * Big Title2
 */
(function() {
    tinymce.create('tinymce.plugins.bigtitle2', {
        init: function(ed, url) {
            ed.addButton('bigtitle2', {
                title: 'Big Title 2',
                image: url + '/bigtitle2-ico.png',
                onclick: function() {
                    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[big_title2]Title[/big_title2]');

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('bigtitle2', tinymce.plugins.bigtitle2);
})(jQuery);
/*
 * Box Link
 */
(function() {
    tinymce.create('tinymce.plugins.boxlink', {
        init: function(ed, url) {
            ed.addButton('boxlink', {
                title: 'Box Link',
                image: url + '/boxlink-ico.png',
                onclick: function() {
                    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[boxlink url="http://"]Content[/boxlink]');

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('boxlink', tinymce.plugins.boxlink);  
})(jQuery);
/*
 * Distance
 */
(function() {
    tinymce.create('tinymce.plugins.distance', {
        init: function(ed, url) {
            ed.addButton('distance', {
                title: 'Distance',
                image: url + '/distance-ico.png',
                onclick: function() {
                    jQuery('.wpb_bootstrap_modals').css('z-index', '100');
                    jQuery('div.modal').css('z-index', '101');
                    jQuery('.modal-backdrop').css('z-index', '100');
                    distance_form();
                    tb_show('Distance | Webnus theme shortcode manager', '#TB_inline?width=700&inlineId=distance-form');
                    jQuery('#TB_window').css('height', 150);
                    jQuery('#TB_window').css('width', 400);
                    jQuery('#TB_window').css('width', 400);
                    jQuery('#TB_window').center();
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('distance', tinymce.plugins.distance);
    
    
    
 function distance_form() //distance
    {

        // creates a form to be displayed everytime the button is clicked
        // you should achieve this using AJAX instead of direct html code like this
        var form = jQuery('<div id="distance-form"><table id="distance-table" class="form-table">\
                <tr>\
                    <th><label for="distance-title">Type</label></th>\
                    <td><select id="distance-type"><option value="1">Distance 1</option><option value="2">Distance 2</option><option value="3">Distance 3</option><option value="4">Distance 4</option></select><br />\
                    <small>Distance Type</small>\
                    </tr></table>\
                <p class="submit">\
                <input type="button" id="distance-submit" class="button-primary" value="Insert Shortcode" name="submit" />\
                </p>\
                </div>');
        var table = form.find('table');
        form.appendTo('body').hide();

        // handles the click event of the submit button
        form.find('#distance-submit').click(function() {

            var distance_type = table.find("#distance-type option:selected").val();
            



            var shortcode = '[distance'+ distance_type +']';
            // inserts the shortcode into the active editor


            tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

            // closes Thickbox
            tb_remove();
        });

    }
})(jQuery);
/*
 * Link
 */
(function() {
    tinymce.create('tinymce.plugins.link1', {
        init: function(ed, url) {
            ed.addButton('link1', {
                title: 'Link (Learn more)',
                image: url + '/link-ico.png',
                onclick: function() {
                    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[link url="http://"]Content[/link]');

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('link1', tinymce.plugins.link1);
})(jQuery);





/*
 * Paragraph
 */
(function() {
    tinymce.create('tinymce.plugins.paragraph', {
        init: function(ed, url) {
            ed.addButton('paragraph', {
                title: 'Paragraph',
                image: url + '/paragraph-ico.png',
                onclick: function() {
                    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[p]Content[/p]');

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('paragraph', tinymce.plugins.paragraph);
})(jQuery);



/*
 * Retina Icon
 */
(function() {
    tinymce.create('tinymce.plugins.retinaicon', {
        init: function(ed, url) {
            ed.addButton('retinaicon', {
                title: 'Retina Icon',
                image: url + '/retinaicon-ico.png',
                onclick: function() {
                    jQuery('.wpb_bootstrap_modals').css('z-index', '100');
                    jQuery('div.modal').css('z-index', '101');
                    jQuery('.modal-backdrop').css('z-index', '100');


                    retinaicon_form();
                    tb_show('Retina Icon | Webnus theme shortcode manager', '#TB_inline?width=700&height=550&inlineId=retinaicon-form');

                    jQuery('#TB_window').css('height', 600);
                    jQuery('#TB_window').css('width', 700);
                    
                    
                    jQuery('#TB_window').center();

                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('retinaicon', tinymce.plugins.retinaicon);
    
    
    jQuery('#TB_window').live("tb_unload", function(){
        jQuery('.webnus-iconfonts-wrapper').remove();
    });
    
    function retinaicon_form() 
    {
        var form = jQuery('<div id="retinaicon-form" class="webnus-iconfonts-wrapper"><table><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td><label for="webnus-icons-colorpicker"></label><input type="text" id="webnus-icons-colorpicker" /></td><td><label for="webnus-icons-url">URL:</label><input type="text" id="webnus-icons-url" value=""/></td><td><label for="webnus-icons-size">Size:</label><input type="text" id="webnus-icons-size" value="18px"/></td></tr></table><div class="webnus-icons-list-wrapper"><ul class="webnus-icons-list"><li><input type="radio" name="iconfonts_name"  id="none" value="none"><label for="none"><i class="none" style="font-size:9px;">None</i></label></li><li><input type="radio" name="iconfonts_name" id="icon-mobile" value="icon-mobile"><label for="icon-mobile"><i class="icon-mobile"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-laptop" value="icon-laptop"><label for="icon-laptop"><i class="icon-laptop"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-desktop" value="icon-desktop"><label for="icon-desktop"><i class="icon-desktop"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-tablet" value="icon-tablet"><label for="icon-tablet"><i class="icon-tablet"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-phone" value="icon-phone"><label for="icon-phone"><i class="icon-phone"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-document" value="icon-document"><label for="icon-document"><i class="icon-document"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-documents" value="icon-documents"><label for="icon-documents"><i class="icon-documents"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-search" value="icon-search"><label for="icon-search"><i class="icon-search"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-clipboard" value="icon-clipboard"><label for="icon-clipboard"><i class="icon-clipboard"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-newspaper" value="icon-newspaper"><label for="icon-newspaper"><i class="icon-newspaper"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-notebook" value="icon-notebook"><label for="icon-notebook"><i class="icon-notebook"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-book-open" value="icon-book-open"><label for="icon-book-open"><i class="icon-book-open"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-browser" value="icon-browser"><label for="icon-browser"><i class="icon-browser"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-calendar" value="icon-calendar"><label for="icon-calendar"><i class="icon-calendar"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-presentation" value="icon-presentation"><label for="icon-presentation"><i class="icon-presentation"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-picture" value="icon-picture"><label for="icon-picture"><i class="icon-picture"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-pictures" value="icon-pictures"><label for="icon-pictures"><i class="icon-pictures"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-video" value="icon-video"><label for="icon-video"><i class="icon-video"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-camera" value="icon-camera"><label for="icon-camera"><i class="icon-camera"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-printer" value="icon-printer"><label for="icon-printer"><i class="icon-printer"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-toolbox" value="icon-toolbox"><label for="icon-toolbox"><i class="icon-toolbox"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-briefcase" value="icon-briefcase"><label for="icon-briefcase"><i class="icon-briefcase"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-wallet" value="icon-wallet"><label for="icon-wallet"><i class="icon-wallet"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-gift" value="icon-gift"><label for="icon-gift"><i class="icon-gift"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-bargraph" value="icon-bargraph"><label for="icon-bargraph"><i class="icon-bargraph"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-grid" value="icon-grid"><label for="icon-grid"><i class="icon-grid"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-expand" value="icon-expand"><label for="icon-expand"><i class="icon-expand"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-focus" value="icon-focus"><label for="icon-focus"><i class="icon-focus"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-edit" value="icon-edit"><label for="icon-edit"><i class="icon-edit"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-adjustments" value="icon-adjustments"><label for="icon-adjustments"><i class="icon-adjustments"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-ribbon" value="icon-ribbon"><label for="icon-ribbon"><i class="icon-ribbon"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-hourglass" value="icon-hourglass"><label for="icon-hourglass"><i class="icon-hourglass"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-lock" value="icon-lock"><label for="icon-lock"><i class="icon-lock"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-megaphone" value="icon-megaphone"><label for="icon-megaphone"><i class="icon-megaphone"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-shield" value="icon-shield"><label for="icon-shield"><i class="icon-shield"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-trophy" value="icon-trophy"><label for="icon-trophy"><i class="icon-trophy"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-flag" value="icon-flag"><label for="icon-flag"><i class="icon-flag"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-map" value="icon-map"><label for="icon-map"><i class="icon-map"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-puzzle" value="icon-puzzle"><label for="icon-puzzle"><i class="icon-puzzle"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-basket" value="icon-basket"><label for="icon-basket"><i class="icon-basket"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-envelope" value="icon-envelope"><label for="icon-envelope"><i class="icon-envelope"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-streetsign" value="icon-streetsign"><label for="icon-streetsign"><i class="icon-streetsign"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-telescope" value="icon-telescope"><label for="icon-telescope"><i class="icon-telescope"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-gears" value="icon-gears"><label for="icon-gears"><i class="icon-gears"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-key" value="icon-key"><label for="icon-key"><i class="icon-key"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-paperclip" value="icon-paperclip"><label for="icon-paperclip"><i class="icon-paperclip"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-attachment" value="icon-attachment"><label for="icon-attachment"><i class="icon-attachment"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-pricetags" value="icon-pricetags"><label for="icon-pricetags"><i class="icon-pricetags"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-lightbulb" value="icon-lightbulb"><label for="icon-lightbulb"><i class="icon-lightbulb"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-layers" value="icon-layers"><label for="icon-layers"><i class="icon-layers"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-pencil" value="icon-pencil"><label for="icon-pencil"><i class="icon-pencil"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-tools" value="icon-tools"><label for="icon-tools"><i class="icon-tools"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-tools-2" value="icon-tools-2"><label for="icon-tools-2"><i class="icon-tools-2"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-scissors" value="icon-scissors"><label for="icon-scissors"><i class="icon-scissors"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-paintbrush" value="icon-paintbrush"><label for="icon-paintbrush"><i class="icon-paintbrush"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-magnifying-glass" value="icon-magnifying-glass"><label for="icon-magnifying-glass"><i class="icon-magnifying-glass"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-circle-compass" value="icon-circle-compass"><label for="icon-circle-compass"><i class="icon-circle-compass"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-linegraph" value="icon-linegraph"><label for="icon-linegraph"><i class="icon-linegraph"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-mic" value="icon-mic"><label for="icon-mic"><i class="icon-mic"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-strategy" value="icon-strategy"><label for="icon-strategy"><i class="icon-strategy"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-beaker" value="icon-beaker"><label for="icon-beaker"><i class="icon-beaker"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-caution" value="icon-caution"><label for="icon-caution"><i class="icon-caution"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-recycle" value="icon-recycle"><label for="icon-recycle"><i class="icon-recycle"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-anchor" value="icon-anchor"><label for="icon-anchor"><i class="icon-anchor"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-profile-male" value="icon-profile-male"><label for="icon-profile-male"><i class="icon-profile-male"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-profile-female" value="icon-profile-female"><label for="icon-profile-female"><i class="icon-profile-female"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-bike" value="icon-bike"><label for="icon-bike"><i class="icon-bike"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-wine" value="icon-wine"><label for="icon-wine"><i class="icon-wine"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-hotairballoon" value="icon-hotairballoon"><label for="icon-hotairballoon"><i class="icon-hotairballoon"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-globe" value="icon-globe"><label for="icon-globe"><i class="icon-globe"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-genius" value="icon-genius"><label for="icon-genius"><i class="icon-genius"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-map-pin" value="icon-map-pin"><label for="icon-map-pin"><i class="icon-map-pin"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-dial" value="icon-dial"><label for="icon-dial"><i class="icon-dial"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-chat" value="icon-chat"><label for="icon-chat"><i class="icon-chat"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-heart" value="icon-heart"><label for="icon-heart"><i class="icon-heart"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-cloud" value="icon-cloud"><label for="icon-cloud"><i class="icon-cloud"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-upload" value="icon-upload"><label for="icon-upload"><i class="icon-upload"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-download" value="icon-download"><label for="icon-download"><i class="icon-download"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-target" value="icon-target"><label for="icon-target"><i class="icon-target"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-hazardous" value="icon-hazardous"><label for="icon-hazardous"><i class="icon-hazardous"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-piechart" value="icon-piechart"><label for="icon-piechart"><i class="icon-piechart"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-speedometer" value="icon-speedometer"><label for="icon-speedometer"><i class="icon-speedometer"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-global" value="icon-global"><label for="icon-global"><i class="icon-global"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-compass" value="icon-compass"><label for="icon-compass"><i class="icon-compass"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-lifesaver" value="icon-lifesaver"><label for="icon-lifesaver"><i class="icon-lifesaver"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-clock" value="icon-clock"><label for="icon-clock"><i class="icon-clock"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-aperture" value="icon-aperture"><label for="icon-aperture"><i class="icon-aperture"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-quote" value="icon-quote"><label for="icon-quote"><i class="icon-quote"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-scope" value="icon-scope"><label for="icon-scope"><i class="icon-scope"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-alarmclock" value="icon-alarmclock"><label for="icon-alarmclock"><i class="icon-alarmclock"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-refresh" value="icon-refresh"><label for="icon-refresh"><i class="icon-refresh"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-happy" value="icon-happy"><label for="icon-happy"><i class="icon-happy"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-sad" value="icon-sad"><label for="icon-sad"><i class="icon-sad"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-facebook" value="icon-facebook"><label for="icon-facebook"><i class="icon-facebook"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-twitter" value="icon-twitter"><label for="icon-twitter"><i class="icon-twitter"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-googleplus" value="icon-googleplus"><label for="icon-googleplus"><i class="icon-googleplus"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-rss" value="icon-rss"><label for="icon-rss"><i class="icon-rss"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-tumblr" value="icon-tumblr"><label for="icon-tumblr"><i class="icon-tumblr"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-linkedin" value="icon-linkedin"><label for="icon-linkedin"><i class="icon-linkedin"></i></label></li><li><input type="radio" name="iconfonts_name" id="icon-dribbble" value="icon-dribbble"><label for="icon-dribbble"><i class="icon-dribbble"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-user" value="sl-user"><label for="sl-user"><i class="sl-user"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-people" value="sl-people"><label for="sl-people"><i class="sl-people"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-user-female" value="sl-user-female"><label for="sl-user-female"><i class="sl-user-female"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-user-follow" value="sl-user-follow"><label for="sl-user-follow"><i class="sl-user-follow"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-user-following" value="sl-user-following"><label for="sl-user-following"><i class="sl-user-following"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-user-unfollow" value="sl-user-unfollow"><label for="sl-user-unfollow"><i class="sl-user-unfollow"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-login" value="sl-login"><label for="sl-login"><i class="sl-login"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-logout" value="sl-logout"><label for="sl-logout"><i class="sl-logout"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-emotsmile" value="sl-emotsmile"><label for="sl-emotsmile"><i class="sl-emotsmile"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-phone" value="sl-phone"><label for="sl-phone"><i class="sl-phone"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-call-end" value="sl-call-end"><label for="sl-call-end"><i class="sl-call-end"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-call-in" value="sl-call-in"><label for="sl-call-in"><i class="sl-call-in"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-call-out" value="sl-call-out"><label for="sl-call-out"><i class="sl-call-out"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-map" value="sl-map"><label for="sl-map"><i class="sl-map"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-location-pin" value="sl-location-pin"><label for="sl-location-pin"><i class="sl-location-pin"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-direction" value="sl-direction"><label for="sl-direction"><i class="sl-direction"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-directions" value="sl-directions"><label for="sl-directions"><i class="sl-directions"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-compass" value="sl-compass"><label for="sl-compass"><i class="sl-compass"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-layers" value="sl-layers"><label for="sl-layers"><i class="sl-layers"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-menu" value="sl-menu"><label for="sl-menu"><i class="sl-menu"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-list" value="sl-list"><label for="sl-list"><i class="sl-list"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-options-vertical" value="sl-options-vertical"><label for="sl-options-vertical"><i class="sl-options-vertical"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-options" value="sl-options"><label for="sl-options"><i class="sl-options"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-arrow-down" value="sl-arrow-down"><label for="sl-arrow-down"><i class="sl-arrow-down"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-arrow-left" value="sl-arrow-left"><label for="sl-arrow-left"><i class="sl-arrow-left"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-arrow-right" value="sl-arrow-right"><label for="sl-arrow-right"><i class="sl-arrow-right"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-arrow-up" value="sl-arrow-up"><label for="sl-arrow-up"><i class="sl-arrow-up"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-arrow-up-circle" value="sl-arrow-up-circle"><label for="sl-arrow-up-circle"><i class="sl-arrow-up-circle"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-arrow-left-circle" value="sl-arrow-left-circle"><label for="sl-arrow-left-circle"><i class="sl-arrow-left-circle"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-arrow-right-circle" value="sl-arrow-right-circle"><label for="sl-arrow-right-circle"><i class="sl-arrow-right-circle"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-arrow-down-circle" value="sl-arrow-down-circle"><label for="sl-arrow-down-circle"><i class="sl-arrow-down-circle"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-check" value="sl-check"><label for="sl-check"><i class="sl-check"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-clock" value="sl-clock"><label for="sl-clock"><i class="sl-clock"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-plus" value="sl-plus"><label for="sl-plus"><i class="sl-plus"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-close" value="sl-close"><label for="sl-close"><i class="sl-close"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-trophy" value="sl-trophy"><label for="sl-trophy"><i class="sl-trophy"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-screen-smartphone" value="sl-screen-smartphone"><label for="sl-screen-smartphone"><i class="sl-screen-smartphone"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-screen-desktop" value="sl-screen-desktop"><label for="sl-screen-desktop"><i class="sl-screen-desktop"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-plane" value="sl-plane"><label for="sl-plane"><i class="sl-plane"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-notebook" value="sl-notebook"><label for="sl-notebook"><i class="sl-notebook"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-mustache" value="sl-mustache"><label for="sl-mustache"><i class="sl-mustache"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-mouse" value="sl-mouse"><label for="sl-mouse"><i class="sl-mouse"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-magnet" value="sl-magnet"><label for="sl-magnet"><i class="sl-magnet"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-energy" value="sl-energy"><label for="sl-energy"><i class="sl-energy"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-disc" value="sl-disc"><label for="sl-disc"><i class="sl-disc"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-cursor" value="sl-cursor"><label for="sl-cursor"><i class="sl-cursor"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-cursor-move" value="sl-cursor-move"><label for="sl-cursor-move"><i class="sl-cursor-move"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-crop" value="sl-crop"><label for="sl-crop"><i class="sl-crop"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-chemistry" value="sl-chemistry"><label for="sl-chemistry"><i class="sl-chemistry"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-speedometer" value="sl-speedometer"><label for="sl-speedometer"><i class="sl-speedometer"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-shield" value="sl-shield"><label for="sl-shield"><i class="sl-shield"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-screen-tablet" value="sl-screen-tablet"><label for="sl-screen-tablet"><i class="sl-screen-tablet"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-magic-wand" value="sl-magic-wand"><label for="sl-magic-wand"><i class="sl-magic-wand"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-hourglass" value="sl-hourglass"><label for="sl-hourglass"><i class="sl-hourglass"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-graduation" value="sl-graduation"><label for="sl-graduation"><i class="sl-graduation"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-ghost" value="sl-ghost"><label for="sl-ghost"><i class="sl-ghost"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-game-controller" value="sl-game-controller"><label for="sl-game-controller"><i class="sl-game-controller"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-fire" value="sl-fire"><label for="sl-fire"><i class="sl-fire"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-eyeglass" value="sl-eyeglass"><label for="sl-eyeglass"><i class="sl-eyeglass"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-envelope-open" value="sl-envelope-open"><label for="sl-envelope-open"><i class="sl-envelope-open"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-envelope-letter" value="sl-envelope-letter"><label for="sl-envelope-letter"><i class="sl-envelope-letter"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-bell" value="sl-bell"><label for="sl-bell"><i class="sl-bell"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-badge" value="sl-badge"><label for="sl-badge"><i class="sl-badge"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-anchor" value="sl-anchor"><label for="sl-anchor"><i class="sl-anchor"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-wallet" value="sl-wallet"><label for="sl-wallet"><i class="sl-wallet"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-vector" value="sl-vector"><label for="sl-vector"><i class="sl-vector"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-speech" value="sl-speech"><label for="sl-speech"><i class="sl-speech"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-puzzle" value="sl-puzzle"><label for="sl-puzzle"><i class="sl-puzzle"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-printer" value="sl-printer"><label for="sl-printer"><i class="sl-printer"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-present" value="sl-present"><label for="sl-present"><i class="sl-present"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-playlist" value="sl-playlist"><label for="sl-playlist"><i class="sl-playlist"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-pin" value="sl-pin"><label for="sl-pin"><i class="sl-pin"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-picture" value="sl-picture"><label for="sl-picture"><i class="sl-picture"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-handbag" value="sl-handbag"><label for="sl-handbag"><i class="sl-handbag"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-globe-alt" value="sl-globe-alt"><label for="sl-globe-alt"><i class="sl-globe-alt"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-globe" value="sl-globe"><label for="sl-globe"><i class="sl-globe"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-folder-alt" value="sl-folder-alt"><label for="sl-folder-alt"><i class="sl-folder-alt"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-folder" value="sl-folder"><label for="sl-folder"><i class="sl-folder"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-film" value="sl-film"><label for="sl-film"><i class="sl-film"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-feed" value="sl-feed"><label for="sl-feed"><i class="sl-feed"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-drop" value="sl-drop"><label for="sl-drop"><i class="sl-drop"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-drawar" value="sl-drawar"><label for="sl-drawar"><i class="sl-drawar"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-docs" value="sl-docs"><label for="sl-docs"><i class="sl-docs"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-doc" value="sl-doc"><label for="sl-doc"><i class="sl-doc"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-diamond" value="sl-diamond"><label for="sl-diamond"><i class="sl-diamond"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-cup" value="sl-cup"><label for="sl-cup"><i class="sl-cup"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-calculator" value="sl-calculator"><label for="sl-calculator"><i class="sl-calculator"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-bubbles" value="sl-bubbles"><label for="sl-bubbles"><i class="sl-bubbles"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-briefcase" value="sl-briefcase"><label for="sl-briefcase"><i class="sl-briefcase"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-book-open" value="sl-book-open"><label for="sl-book-open"><i class="sl-book-open"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-basket-loaded" value="sl-basket-loaded"><label for="sl-basket-loaded"><i class="sl-basket-loaded"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-basket" value="sl-basket"><label for="sl-basket"><i class="sl-basket"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-bag" value="sl-bag"><label for="sl-bag"><i class="sl-bag"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-action-undo" value="sl-action-undo"><label for="sl-action-undo"><i class="sl-action-undo"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-action-redo" value="sl-action-redo"><label for="sl-action-redo"><i class="sl-action-redo"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-wrench" value="sl-wrench"><label for="sl-wrench"><i class="sl-wrench"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-umbrella" value="sl-umbrella"><label for="sl-umbrella"><i class="sl-umbrella"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-trash" value="sl-trash"><label for="sl-trash"><i class="sl-trash"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-tag" value="sl-tag"><label for="sl-tag"><i class="sl-tag"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-support" value="sl-support"><label for="sl-support"><i class="sl-support"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-frame" value="sl-frame"><label for="sl-frame"><i class="sl-frame"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-size-fullscreen" value="sl-size-fullscreen"><label for="sl-size-fullscreen"><i class="sl-size-fullscreen"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-size-actual" value="sl-size-actual"><label for="sl-size-actual"><i class="sl-size-actual"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-shuffle" value="sl-shuffle"><label for="sl-shuffle"><i class="sl-shuffle"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-share-alt" value="sl-share-alt"><label for="sl-share-alt"><i class="sl-share-alt"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-share" value="sl-share"><label for="sl-share"><i class="sl-share"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-rocket" value="sl-rocket"><label for="sl-rocket"><i class="sl-rocket"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-question" value="sl-question"><label for="sl-question"><i class="sl-question"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-pie-chart" value="sl-pie-chart"><label for="sl-pie-chart"><i class="sl-pie-chart"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-pencil" value="sl-pencil"><label for="sl-pencil"><i class="sl-pencil"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-note" value="sl-note"><label for="sl-note"><i class="sl-note"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-loop" value="sl-loop"><label for="sl-loop"><i class="sl-loop"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-home" value="sl-home"><label for="sl-home"><i class="sl-home"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-grid" value="sl-grid"><label for="sl-grid"><i class="sl-grid"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-graph" value="sl-graph"><label for="sl-graph"><i class="sl-graph"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-microphone" value="sl-microphone"><label for="sl-microphone"><i class="sl-microphone"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-music-tone-alt" value="sl-music-tone-alt"><label for="sl-music-tone-alt"><i class="sl-music-tone-alt"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-music-tone" value="sl-music-tone"><label for="sl-music-tone"><i class="sl-music-tone"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-earphones-alt" value="sl-earphones-alt"><label for="sl-earphones-alt"><i class="sl-earphones-alt"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-earphones" value="sl-earphones"><label for="sl-earphones"><i class="sl-earphones"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-equalizer" value="sl-equalizer"><label for="sl-equalizer"><i class="sl-equalizer"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-like" value="sl-like"><label for="sl-like"><i class="sl-like"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-dislike" value="sl-dislike"><label for="sl-dislike"><i class="sl-dislike"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-control-start" value="sl-control-start"><label for="sl-control-start"><i class="sl-control-start"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-control-rewind" value="sl-control-rewind"><label for="sl-control-rewind"><i class="sl-control-rewind"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-control-play" value="sl-control-play"><label for="sl-control-play"><i class="sl-control-play"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-control-pause" value="sl-control-pause"><label for="sl-control-pause"><i class="sl-control-pause"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-control-forward" value="sl-control-forward"><label for="sl-control-forward"><i class="sl-control-forward"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-control-end" value="sl-control-end"><label for="sl-control-end"><i class="sl-control-end"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-volume-1" value="sl-volume-1"><label for="sl-volume-1"><i class="sl-volume-1"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-volume-2" value="sl-volume-2"><label for="sl-volume-2"><i class="sl-volume-2"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-volume-off" value="sl-volume-off"><label for="sl-volume-off"><i class="sl-volume-off"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-calendar" value="sl-calendar"><label for="sl-calendar"><i class="sl-calendar"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-bulb" value="sl-bulb"><label for="sl-bulb"><i class="sl-bulb"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-chart" value="sl-chart"><label for="sl-chart"><i class="sl-chart"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-ban" value="sl-ban"><label for="sl-ban"><i class="sl-ban"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-bubble" value="sl-bubble"><label for="sl-bubble"><i class="sl-bubble"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-camrecorder" value="sl-camrecorder"><label for="sl-camrecorder"><i class="sl-camrecorder"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-camera" value="sl-camera"><label for="sl-camera"><i class="sl-camera"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-cloud-download" value="sl-cloud-download"><label for="sl-cloud-download"><i class="sl-cloud-download"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-cloud-upload" value="sl-cloud-upload"><label for="sl-cloud-upload"><i class="sl-cloud-upload"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-envelope" value="sl-envelope"><label for="sl-envelope"><i class="sl-envelope"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-eye" value="sl-eye"><label for="sl-eye"><i class="sl-eye"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-flag" value="sl-flag"><label for="sl-flag"><i class="sl-flag"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-heart" value="sl-heart"><label for="sl-heart"><i class="sl-heart"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-info" value="sl-info"><label for="sl-info"><i class="sl-info"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-key" value="sl-key"><label for="sl-key"><i class="sl-key"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-link" value="sl-link"><label for="sl-link"><i class="sl-link"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-lock" value="sl-lock"><label for="sl-lock"><i class="sl-lock"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-lock-open" value="sl-lock-open"><label for="sl-lock-open"><i class="sl-lock-open"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-magnifier" value="sl-magnifier"><label for="sl-magnifier"><i class="sl-magnifier"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-magnifier-add" value="sl-magnifier-add"><label for="sl-magnifier-add"><i class="sl-magnifier-add"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-magnifier-remove" value="sl-magnifier-remove"><label for="sl-magnifier-remove"><i class="sl-magnifier-remove"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-paper-clip" value="sl-paper-clip"><label for="sl-paper-clip"><i class="sl-paper-clip"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-paper-plane" value="sl-paper-plane"><label for="sl-paper-plane"><i class="sl-paper-plane"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-power" value="sl-power"><label for="sl-power"><i class="sl-power"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-refresh" value="sl-refresh"><label for="sl-refresh"><i class="sl-refresh"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-reload" value="sl-reload"><label for="sl-reload"><i class="sl-reload"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-settings" value="sl-settings"><label for="sl-settings"><i class="sl-settings"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-star" value="sl-star"><label for="sl-star"><i class="sl-star"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-symble-female" value="sl-symble-female"><label for="sl-symble-female"><i class="sl-symble-female"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-symbol-male" value="sl-symbol-male"><label for="sl-symbol-male"><i class="sl-symbol-male"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-target" value="sl-target"><label for="sl-target"><i class="sl-target"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-credit-card" value="sl-credit-card"><label for="sl-credit-card"><i class="sl-credit-card"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-paypal" value="sl-paypal"><label for="sl-paypal"><i class="sl-paypal"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-tumblr" value="sl-social-tumblr"><label for="sl-social-tumblr"><i class="sl-social-tumblr"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-twitter" value="sl-social-twitter"><label for="sl-social-twitter"><i class="sl-social-twitter"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-facebook" value="sl-social-facebook"><label for="sl-social-facebook"><i class="sl-social-facebook"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-instagram" value="sl-social-instagram"><label for="sl-social-instagram"><i class="sl-social-instagram"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-linkedin" value="sl-social-linkedin"><label for="sl-social-linkedin"><i class="sl-social-linkedin"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-pinterest" value="sl-social-pinterest"><label for="sl-social-pinterest"><i class="sl-social-pinterest"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-github" value="sl-social-github"><label for="sl-social-github"><i class="sl-social-github"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-gplus" value="sl-social-gplus"><label for="sl-social-gplus"><i class="sl-social-gplus"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-reddit" value="sl-social-reddit"><label for="sl-social-reddit"><i class="sl-social-reddit"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-skype" value="sl-social-skype"><label for="sl-social-skype"><i class="sl-social-skype"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-dribbble" value="sl-social-dribbble"><label for="sl-social-dribbble"><i class="sl-social-dribbble"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-behance" value="sl-social-behance"><label for="sl-social-behance"><i class="sl-social-behance"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-foursqare" value="sl-social-foursqare"><label for="sl-social-foursqare"><i class="sl-social-foursqare"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-soundcloud" value="sl-social-soundcloud"><label for="sl-social-soundcloud"><i class="sl-social-soundcloud"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-spotify" value="sl-social-spotify"><label for="sl-social-spotify"><i class="sl-social-spotify"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-stumbleupon" value="sl-social-stumbleupon"><label for="sl-social-stumbleupon"><i class="sl-social-stumbleupon"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-youtube" value="sl-social-youtube"><label for="sl-social-youtube"><i class="sl-social-youtube"></i></label></li><li><input type="radio" name="iconfonts_name"  id="sl-social-dropbox" value="sl-social-dropbox"><label for="sl-social-dropbox"><i class="sl-social-dropbox"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_heart" value="li_heart"><label for="li_heart"><i class="li_heart"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_cloud" value="li_cloud"><label for="li_cloud"><i class="li_cloud"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_star" value="li_star"><label for="li_star"><i class="li_star"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_tv" value="li_tv"><label for="li_tv"><i class="li_tv"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_sound" value="li_sound"><label for="li_sound"><i class="li_sound"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_video" value="li_video"><label for="li_video"><i class="li_video"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_trash" value="li_trash"><label for="li_trash"><i class="li_trash"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_user" value="li_user"><label for="li_user"><i class="li_user"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_key" value="li_key"><label for="li_key"><i class="li_key"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_search" value="li_search"><label for="li_search"><i class="li_search"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_settings" value="li_settings"><label for="li_settings"><i class="li_settings"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_camera" value="li_camera"><label for="li_camera"><i class="li_camera"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_tag" value="li_tag"><label for="li_tag"><i class="li_tag"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_lock" value="li_lock"><label for="li_lock"><i class="li_lock"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_bulb" value="li_bulb"><label for="li_bulb"><i class="li_bulb"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_pen" value="li_pen"><label for="li_pen"><i class="li_pen"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_diamond" value="li_diamond"><label for="li_diamond"><i class="li_diamond"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_display" value="li_display"><label for="li_display"><i class="li_display"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_location" value="li_location"><label for="li_location"><i class="li_location"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_eye" value="li_eye"><label for="li_eye"><i class="li_eye"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_bubble" value="li_bubble"><label for="li_bubble"><i class="li_bubble"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_stack" value="li_stack"><label for="li_stack"><i class="li_stack"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_cup" value="li_cup"><label for="li_cup"><i class="li_cup"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_phone" value="li_phone"><label for="li_phone"><i class="li_phone"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_news" value="li_news"><label for="li_news"><i class="li_news"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_mail" value="li_mail"><label for="li_mail"><i class="li_mail"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_like" value="li_like"><label for="li_like"><i class="li_like"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_photo" value="li_photo"><label for="li_photo"><i class="li_photo"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_note" value="li_note"><label for="li_note"><i class="li_note"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_clock" value="li_clock"><label for="li_clock"><i class="li_clock"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_paperplane" value="li_paperplane"><label for="li_paperplane"><i class="li_paperplane"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_params" value="li_params"><label for="li_params"><i class="li_params"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_banknote" value="li_banknote"><label for="li_banknote"><i class="li_banknote"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_data" value="li_data"><label for="li_data"><i class="li_data"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_music" value="li_music"><label for="li_music"><i class="li_music"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_megaphone" value="li_megaphone"><label for="li_megaphone"><i class="li_megaphone"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_study" value="li_study"><label for="li_study"><i class="li_study"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_lab" value="li_lab"><label for="li_lab"><i class="li_lab"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_food" value="li_food"><label for="li_food"><i class="li_food"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_t-shirt" value="li_t-shirt"><label for="li_t-shirt"><i class="li_t-shirt"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_fire" value="li_fire"><label for="li_fire"><i class="li_fire"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_clip" value="li_clip"><label for="li_clip"><i class="li_clip"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_shop" value="li_shop"><label for="li_shop"><i class="li_shop"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_calendar" value="li_calendar"><label for="li_calendar"><i class="li_calendar"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_vallet" value="li_vallet"><label for="li_vallet"><i class="li_vallet"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_vynil" value="li_vynil"><label for="li_vynil"><i class="li_vynil"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_truck" value="li_truck"><label for="li_truck"><i class="li_truck"></i></label></li><li><input type="radio" name="iconfonts_name"  id="li_world" value="li_world"><label for="li_world"><i class="li_world"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-glass" value="fa-glass"><label for="fa-glass"><i class="fa-glass"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-music" value="fa-music"><label for="fa-music"><i class="fa-music"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-search" value="fa-search"><label for="fa-search"><i class="fa-search"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-envelope-o" value="fa-envelope-o"><label for="fa-envelope-o"><i class="fa-envelope-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-heart" value="fa-heart"><label for="fa-heart"><i class="fa-heart"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-star" value="fa-star"><label for="fa-star"><i class="fa-star"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-star-o" value="fa-star-o"><label for="fa-star-o"><i class="fa-star-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-user" value="fa-user"><label for="fa-user"><i class="fa-user"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-film" value="fa-film"><label for="fa-film"><i class="fa-film"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-th-large" value="fa-th-large"><label for="fa-th-large"><i class="fa-th-large"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-th" value="fa-th"><label for="fa-th"><i class="fa-th"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-th-list" value="fa-th-list"><label for="fa-th-list"><i class="fa-th-list"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-check" value="fa-check"><label for="fa-check"><i class="fa-check"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-close" value="fa-close"><label for="fa-close"><i class="fa-close"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-search-plus" value="fa-search-plus"><label for="fa-search-plus"><i class="fa-search-plus"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-search-minus" value="fa-search-minus"><label for="fa-search-minus"><i class="fa-search-minus"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-power-off" value="fa-power-off"><label for="fa-power-off"><i class="fa-power-off"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-signal" value="fa-signal"><label for="fa-signal"><i class="fa-signal"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-gear" value="fa-gear"><label for="fa-gear"><i class="fa-gear"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-trash-o" value="fa-trash-o"><label for="fa-trash-o"><i class="fa-trash-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-home" value="fa-home"><label for="fa-home"><i class="fa-home"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file-o" value="fa-file-o"><label for="fa-file-o"><i class="fa-file-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-clock-o" value="fa-clock-o"><label for="fa-clock-o"><i class="fa-clock-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-road" value="fa-road"><label for="fa-road"><i class="fa-road"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-download" value="fa-download"><label for="fa-download"><i class="fa-download"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrow-circle-o-down" value="fa-arrow-circle-o-down"><label for="fa-arrow-circle-o-down"><i class="fa-arrow-circle-o-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrow-circle-o-up" value="fa-arrow-circle-o-up"><label for="fa-arrow-circle-o-up"><i class="fa-arrow-circle-o-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-inbox" value="fa-inbox"><label for="fa-inbox"><i class="fa-inbox"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-play-circle-o" value="fa-play-circle-o"><label for="fa-play-circle-o"><i class="fa-play-circle-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-rotate-right" value="fa-rotate-right"><label for="fa-rotate-right"><i class="fa-rotate-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-refresh" value="fa-refresh"><label for="fa-refresh"><i class="fa-refresh"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-list-alt" value="fa-list-alt"><label for="fa-list-alt"><i class="fa-list-alt"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-lock" value="fa-lock"><label for="fa-lock"><i class="fa-lock"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-flag" value="fa-flag"><label for="fa-flag"><i class="fa-flag"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-headphones" value="fa-headphones"><label for="fa-headphones"><i class="fa-headphones"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-volume-off" value="fa-volume-off"><label for="fa-volume-off"><i class="fa-volume-off"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-volume-down" value="fa-volume-down"><label for="fa-volume-down"><i class="fa-volume-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-volume-up" value="fa-volume-up"><label for="fa-volume-up"><i class="fa-volume-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-qrcode" value="fa-qrcode"><label for="fa-qrcode"><i class="fa-qrcode"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-barcode" value="fa-barcode"><label for="fa-barcode"><i class="fa-barcode"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-tag" value="fa-tag"><label for="fa-tag"><i class="fa-tag"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-tags" value="fa-tags"><label for="fa-tags"><i class="fa-tags"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-book" value="fa-book"><label for="fa-book"><i class="fa-book"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bookmark" value="fa-bookmark"><label for="fa-bookmark"><i class="fa-bookmark"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-print" value="fa-print"><label for="fa-print"><i class="fa-print"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-camera" value="fa-camera"><label for="fa-camera"><i class="fa-camera"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-font" value="fa-font"><label for="fa-font"><i class="fa-font"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bold" value="fa-bold"><label for="fa-bold"><i class="fa-bold"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-italic" value="fa-italic"><label for="fa-italic"><i class="fa-italic"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-text-height" value="fa-text-height"><label for="fa-text-height"><i class="fa-text-height"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-text-width" value="fa-text-width"><label for="fa-text-width"><i class="fa-text-width"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-align-left" value="fa-align-left"><label for="fa-align-left"><i class="fa-align-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-align-center" value="fa-align-center"><label for="fa-align-center"><i class="fa-align-center"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-align-right" value="fa-align-right"><label for="fa-align-right"><i class="fa-align-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-align-justify" value="fa-align-justify"><label for="fa-align-justify"><i class="fa-align-justify"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-list" value="fa-list"><label for="fa-list"><i class="fa-list"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-outdent" value="fa-outdent"><label for="fa-outdent"><i class="fa-outdent"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-indent" value="fa-indent"><label for="fa-indent"><i class="fa-indent"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-video-camera" value="fa-video-camera"><label for="fa-video-camera"><i class="fa-video-camera"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-picture-o" value="fa-picture-o"><label for="fa-picture-o"><i class="fa-picture-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pencil" value="fa-pencil"><label for="fa-pencil"><i class="fa-pencil"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-map-marker" value="fa-map-marker"><label for="fa-map-marker"><i class="fa-map-marker"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-adjust" value="fa-adjust"><label for="fa-adjust"><i class="fa-adjust"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-tint" value="fa-tint"><label for="fa-tint"><i class="fa-tint"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-edit" value="fa-edit"><label for="fa-edit"><i class="fa-edit"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pencil-square-o" value="fa-pencil-square-o"><label for="fa-pencil-square-o"><i class="fa-pencil-square-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-share-square-o" value="fa-share-square-o"><label for="fa-share-square-o"><i class="fa-share-square-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-check-square-o" value="fa-check-square-o"><label for="fa-check-square-o"><i class="fa-check-square-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrows" value="fa-arrows"><label for="fa-arrows"><i class="fa-arrows"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-step-backward" value="fa-step-backward"><label for="fa-step-backward"><i class="fa-step-backward"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-fast-backward" value="fa-fast-backward"><label for="fa-fast-backward"><i class="fa-fast-backward"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-backward" value="fa-backward"><label for="fa-backward"><i class="fa-backward"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-play" value="fa-play"><label for="fa-play"><i class="fa-play"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pause" value="fa-pause"><label for="fa-pause"><i class="fa-pause"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-stop" value="fa-stop"><label for="fa-stop"><i class="fa-stop"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-forward" value="fa-forward"><label for="fa-forward"><i class="fa-forward"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-fast-forward" value="fa-fast-forward"><label for="fa-fast-forward"><i class="fa-fast-forward"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-step-forward" value="fa-step-forward"><label for="fa-step-forward"><i class="fa-step-forward"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-eject" value="fa-eject"><label for="fa-eject"><i class="fa-eject"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-chevron-left" value="fa-chevron-left"><label for="fa-chevron-left"><i class="fa-chevron-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-chevron-right" value="fa-chevron-right"><label for="fa-chevron-right"><i class="fa-chevron-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-plus-circle" value="fa-plus-circle"><label for="fa-plus-circle"><i class="fa-plus-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-minus-circle" value="fa-minus-circle"><label for="fa-minus-circle"><i class="fa-minus-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-times-circle" value="fa-times-circle"><label for="fa-times-circle"><i class="fa-times-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-check-circle" value="fa-check-circle"><label for="fa-check-circle"><i class="fa-check-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-question-circle" value="fa-question-circle"><label for="fa-question-circle"><i class="fa-question-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-info-circle" value="fa-info-circle"><label for="fa-info-circle"><i class="fa-info-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-crosshairs" value="fa-crosshairs"><label for="fa-crosshairs"><i class="fa-crosshairs"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-times-circle-o" value="fa-times-circle-o"><label for="fa-times-circle-o"><i class="fa-times-circle-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-check-circle-o" value="fa-check-circle-o"><label for="fa-check-circle-o"><i class="fa-check-circle-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-ban" value="fa-ban"><label for="fa-ban"><i class="fa-ban"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrow-left" value="fa-arrow-left"><label for="fa-arrow-left"><i class="fa-arrow-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrow-right" value="fa-arrow-right"><label for="fa-arrow-right"><i class="fa-arrow-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrow-up" value="fa-arrow-up"><label for="fa-arrow-up"><i class="fa-arrow-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrow-down" value="fa-arrow-down"><label for="fa-arrow-down"><i class="fa-arrow-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-share" value="fa-share"><label for="fa-share"><i class="fa-share"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-expand" value="fa-expand"><label for="fa-expand"><i class="fa-expand"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-compress" value="fa-compress"><label for="fa-compress"><i class="fa-compress"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-plus" value="fa-plus"><label for="fa-plus"><i class="fa-plus"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-minus" value="fa-minus"><label for="fa-minus"><i class="fa-minus"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-asterisk" value="fa-asterisk"><label for="fa-asterisk"><i class="fa-asterisk"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-exclamation-circle" value="fa-exclamation-circle"><label for="fa-exclamation-circle"><i class="fa-exclamation-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-gift" value="fa-gift"><label for="fa-gift"><i class="fa-gift"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-leaf" value="fa-leaf"><label for="fa-leaf"><i class="fa-leaf"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-fire" value="fa-fire"><label for="fa-fire"><i class="fa-fire"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-eye" value="fa-eye"><label for="fa-eye"><i class="fa-eye"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-eye-slash" value="fa-eye-slash"><label for="fa-eye-slash"><i class="fa-eye-slash"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-warning" value="fa-warning"><label for="fa-warning"><i class="fa-warning"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-plane" value="fa-plane"><label for="fa-plane"><i class="fa-plane"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-calendar" value="fa-calendar"><label for="fa-calendar"><i class="fa-calendar"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-random" value="fa-random"><label for="fa-random"><i class="fa-random"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-comment" value="fa-comment"><label for="fa-comment"><i class="fa-comment"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-magnet" value="fa-magnet"><label for="fa-magnet"><i class="fa-magnet"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-chevron-up" value="fa-chevron-up"><label for="fa-chevron-up"><i class="fa-chevron-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-chevron-down" value="fa-chevron-down"><label for="fa-chevron-down"><i class="fa-chevron-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-retweet" value="fa-retweet"><label for="fa-retweet"><i class="fa-retweet"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-shopping-cart" value="fa-shopping-cart"><label for="fa-shopping-cart"><i class="fa-shopping-cart"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-folder" value="fa-folder"><label for="fa-folder"><i class="fa-folder"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-folder-open" value="fa-folder-open"><label for="fa-folder-open"><i class="fa-folder-open"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrows-v" value="fa-arrows-v"><label for="fa-arrows-v"><i class="fa-arrows-v"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrows-h" value="fa-arrows-h"><label for="fa-arrows-h"><i class="fa-arrows-h"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bar-chart" value="fa-bar-chart"><label for="fa-bar-chart"><i class="fa-bar-chart"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-twitter-square" value="fa-twitter-square"><label for="fa-twitter-square"><i class="fa-twitter-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-facebook-square" value="fa-facebook-square"><label for="fa-facebook-square"><i class="fa-facebook-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-camera-retro" value="fa-camera-retro"><label for="fa-camera-retro"><i class="fa-camera-retro"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-key" value="fa-key"><label for="fa-key"><i class="fa-key"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-gears" value="fa-gears"><label for="fa-gears"><i class="fa-gears"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-comments" value="fa-comments"><label for="fa-comments"><i class="fa-comments"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-thumbs-o-up" value="fa-thumbs-o-up"><label for="fa-thumbs-o-up"><i class="fa-thumbs-o-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-thumbs-o-down" value="fa-thumbs-o-down"><label for="fa-thumbs-o-down"><i class="fa-thumbs-o-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-star-half" value="fa-star-half"><label for="fa-star-half"><i class="fa-star-half"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-heart-o" value="fa-heart-o"><label for="fa-heart-o"><i class="fa-heart-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sign-out" value="fa-sign-out"><label for="fa-sign-out"><i class="fa-sign-out"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-linkedin-square" value="fa-linkedin-square"><label for="fa-linkedin-square"><i class="fa-linkedin-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-thumb-tack" value="fa-thumb-tack"><label for="fa-thumb-tack"><i class="fa-thumb-tack"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-external-link" value="fa-external-link"><label for="fa-external-link"><i class="fa-external-link"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sign-in" value="fa-sign-in"><label for="fa-sign-in"><i class="fa-sign-in"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-trophy" value="fa-trophy"><label for="fa-trophy"><i class="fa-trophy"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-github-square" value="fa-github-square"><label for="fa-github-square"><i class="fa-github-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-upload" value="fa-upload"><label for="fa-upload"><i class="fa-upload"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-lemon-o" value="fa-lemon-o"><label for="fa-lemon-o"><i class="fa-lemon-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-phone" value="fa-phone"><label for="fa-phone"><i class="fa-phone"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-square-o" value="fa-square-o"><label for="fa-square-o"><i class="fa-square-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bookmark-o" value="fa-bookmark-o"><label for="fa-bookmark-o"><i class="fa-bookmark-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-phone-square" value="fa-phone-square"><label for="fa-phone-square"><i class="fa-phone-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-twitter" value="fa-twitter"><label for="fa-twitter"><i class="fa-twitter"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-facebook" value="fa-facebook"><label for="fa-facebook"><i class="fa-facebook"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-github" value="fa-github"><label for="fa-github"><i class="fa-github"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-unlock" value="fa-unlock"><label for="fa-unlock"><i class="fa-unlock"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-credit-card" value="fa-credit-card"><label for="fa-credit-card"><i class="fa-credit-card"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-feed" value="fa-feed"><label for="fa-feed"><i class="fa-feed"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hdd-o" value="fa-hdd-o"><label for="fa-hdd-o"><i class="fa-hdd-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bullhorn" value="fa-bullhorn"><label for="fa-bullhorn"><i class="fa-bullhorn"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bell" value="fa-bell"><label for="fa-bell"><i class="fa-bell"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-certificate" value="fa-certificate"><label for="fa-certificate"><i class="fa-certificate"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hand-o-right" value="fa-hand-o-right"><label for="fa-hand-o-right"><i class="fa-hand-o-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hand-o-left" value="fa-hand-o-left"><label for="fa-hand-o-left"><i class="fa-hand-o-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hand-o-up" value="fa-hand-o-up"><label for="fa-hand-o-up"><i class="fa-hand-o-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hand-o-down" value="fa-hand-o-down"><label for="fa-hand-o-down"><i class="fa-hand-o-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrow-circle-left" value="fa-arrow-circle-left"><label for="fa-arrow-circle-left"><i class="fa-arrow-circle-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrow-circle-right" value="fa-arrow-circle-right"><label for="fa-arrow-circle-right"><i class="fa-arrow-circle-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrow-circle-up" value="fa-arrow-circle-up"><label for="fa-arrow-circle-up"><i class="fa-arrow-circle-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrow-circle-down" value="fa-arrow-circle-down"><label for="fa-arrow-circle-down"><i class="fa-arrow-circle-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-globe" value="fa-globe"><label for="fa-globe"><i class="fa-globe"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-wrench" value="fa-wrench"><label for="fa-wrench"><i class="fa-wrench"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-tasks" value="fa-tasks"><label for="fa-tasks"><i class="fa-tasks"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-filter" value="fa-filter"><label for="fa-filter"><i class="fa-filter"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-briefcase" value="fa-briefcase"><label for="fa-briefcase"><i class="fa-briefcase"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrows-alt" value="fa-arrows-alt"><label for="fa-arrows-alt"><i class="fa-arrows-alt"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-group" value="fa-group"><label for="fa-group"><i class="fa-group"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-link" value="fa-link"><label for="fa-link"><i class="fa-link"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cloud" value="fa-cloud"><label for="fa-cloud"><i class="fa-cloud"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-flask" value="fa-flask"><label for="fa-flask"><i class="fa-flask"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-scissors" value="fa-scissors"><label for="fa-scissors"><i class="fa-scissors"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-files-o" value="fa-files-o"><label for="fa-files-o"><i class="fa-files-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-paperclip" value="fa-paperclip"><label for="fa-paperclip"><i class="fa-paperclip"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-floppy-o" value="fa-floppy-o"><label for="fa-floppy-o"><i class="fa-floppy-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-square" value="fa-square"><label for="fa-square"><i class="fa-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-reorder" value="fa-reorder"><label for="fa-reorder"><i class="fa-reorder"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-list-ul" value="fa-list-ul"><label for="fa-list-ul"><i class="fa-list-ul"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-list-ol" value="fa-list-ol"><label for="fa-list-ol"><i class="fa-list-ol"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-strikethrough" value="fa-strikethrough"><label for="fa-strikethrough"><i class="fa-strikethrough"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-underline" value="fa-underline"><label for="fa-underline"><i class="fa-underline"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-table" value="fa-table"><label for="fa-table"><i class="fa-table"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-magic" value="fa-magic"><label for="fa-magic"><i class="fa-magic"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-truck" value="fa-truck"><label for="fa-truck"><i class="fa-truck"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pinterest" value="fa-pinterest"><label for="fa-pinterest"><i class="fa-pinterest"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pinterest-square" value="fa-pinterest-square"><label for="fa-pinterest-square"><i class="fa-pinterest-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-google-plus-square" value="fa-google-plus-square"><label for="fa-google-plus-square"><i class="fa-google-plus-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-google-plus" value="fa-google-plus"><label for="fa-google-plus"><i class="fa-google-plus"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-money" value="fa-money"><label for="fa-money"><i class="fa-money"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-caret-down" value="fa-caret-down"><label for="fa-caret-down"><i class="fa-caret-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-caret-up" value="fa-caret-up"><label for="fa-caret-up"><i class="fa-caret-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-caret-left" value="fa-caret-left"><label for="fa-caret-left"><i class="fa-caret-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-caret-right" value="fa-caret-right"><label for="fa-caret-right"><i class="fa-caret-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-columns" value="fa-columns"><label for="fa-columns"><i class="fa-columns"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sort" value="fa-sort"><label for="fa-sort"><i class="fa-sort"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-unsorted" value="fa-unsorted"><label for="fa-unsorted"><i class="fa-unsorted"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sort-desc" value="fa-sort-desc"><label for="fa-sort-desc"><i class="fa-sort-desc"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sort-down" value="fa-sort-down"><label for="fa-sort-down"><i class="fa-sort-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sort-asc" value="fa-sort-asc"><label for="fa-sort-asc"><i class="fa-sort-asc"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sort-up" value="fa-sort-up"><label for="fa-sort-up"><i class="fa-sort-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-envelope" value="fa-envelope"><label for="fa-envelope"><i class="fa-envelope"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-linkedin" value="fa-linkedin"><label for="fa-linkedin"><i class="fa-linkedin"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-rotate-left" value="fa-rotate-left"><label for="fa-rotate-left"><i class="fa-rotate-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-legal" value="fa-legal"><label for="fa-legal"><i class="fa-legal"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-dashboard" value="fa-dashboard"><label for="fa-dashboard"><i class="fa-dashboard"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-comment-o" value="fa-comment-o"><label for="fa-comment-o"><i class="fa-comment-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-comments-o" value="fa-comments-o"><label for="fa-comments-o"><i class="fa-comments-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bolt" value="fa-bolt"><label for="fa-bolt"><i class="fa-bolt"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sitemap" value="fa-sitemap"><label for="fa-sitemap"><i class="fa-sitemap"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-umbrella" value="fa-umbrella"><label for="fa-umbrella"><i class="fa-umbrella"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-clipboard" value="fa-clipboard"><label for="fa-clipboard"><i class="fa-clipboard"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-lightbulb-o" value="fa-lightbulb-o"><label for="fa-lightbulb-o"><i class="fa-lightbulb-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-exchange" value="fa-exchange"><label for="fa-exchange"><i class="fa-exchange"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cloud-download" value="fa-cloud-download"><label for="fa-cloud-download"><i class="fa-cloud-download"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cloud-upload" value="fa-cloud-upload"><label for="fa-cloud-upload"><i class="fa-cloud-upload"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-user-md" value="fa-user-md"><label for="fa-user-md"><i class="fa-user-md"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-stethoscope" value="fa-stethoscope"><label for="fa-stethoscope"><i class="fa-stethoscope"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-suitcase" value="fa-suitcase"><label for="fa-suitcase"><i class="fa-suitcase"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bell-o" value="fa-bell-o"><label for="fa-bell-o"><i class="fa-bell-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-coffee" value="fa-coffee"><label for="fa-coffee"><i class="fa-coffee"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cutlery" value="fa-cutlery"><label for="fa-cutlery"><i class="fa-cutlery"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file-text-o" value="fa-file-text-o"><label for="fa-file-text-o"><i class="fa-file-text-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-building-o" value="fa-building-o"><label for="fa-building-o"><i class="fa-building-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hospital-o" value="fa-hospital-o"><label for="fa-hospital-o"><i class="fa-hospital-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-ambulance" value="fa-ambulance"><label for="fa-ambulance"><i class="fa-ambulance"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-medkit" value="fa-medkit"><label for="fa-medkit"><i class="fa-medkit"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-fighter-jet" value="fa-fighter-jet"><label for="fa-fighter-jet"><i class="fa-fighter-jet"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-beer" value="fa-beer"><label for="fa-beer"><i class="fa-beer"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-h-square" value="fa-h-square"><label for="fa-h-square"><i class="fa-h-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-plus-square" value="fa-plus-square"><label for="fa-plus-square"><i class="fa-plus-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-angle-double-left" value="fa-angle-double-left"><label for="fa-angle-double-left"><i class="fa-angle-double-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-angle-double-right" value="fa-angle-double-right"><label for="fa-angle-double-right"><i class="fa-angle-double-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-angle-double-up" value="fa-angle-double-up"><label for="fa-angle-double-up"><i class="fa-angle-double-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-angle-double-down" value="fa-angle-double-down"><label for="fa-angle-double-down"><i class="fa-angle-double-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-angle-left" value="fa-angle-left"><label for="fa-angle-left"><i class="fa-angle-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-angle-right" value="fa-angle-right"><label for="fa-angle-right"><i class="fa-angle-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-angle-up" value="fa-angle-up"><label for="fa-angle-up"><i class="fa-angle-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-angle-down" value="fa-angle-down"><label for="fa-angle-down"><i class="fa-angle-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-desktop" value="fa-desktop"><label for="fa-desktop"><i class="fa-desktop"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-laptop" value="fa-laptop"><label for="fa-laptop"><i class="fa-laptop"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-tablet" value="fa-tablet"><label for="fa-tablet"><i class="fa-tablet"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-mobile" value="fa-mobile"><label for="fa-mobile"><i class="fa-mobile"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-circle-o" value="fa-circle-o"><label for="fa-circle-o"><i class="fa-circle-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-quote-left" value="fa-quote-left"><label for="fa-quote-left"><i class="fa-quote-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-quote-right" value="fa-quote-right"><label for="fa-quote-right"><i class="fa-quote-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-spinner" value="fa-spinner"><label for="fa-spinner"><i class="fa-spinner"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-circle" value="fa-circle"><label for="fa-circle"><i class="fa-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-reply" value="fa-reply"><label for="fa-reply"><i class="fa-reply"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-github-alt" value="fa-github-alt"><label for="fa-github-alt"><i class="fa-github-alt"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-folder-o" value="fa-folder-o"><label for="fa-folder-o"><i class="fa-folder-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-folder-open-o" value="fa-folder-open-o"><label for="fa-folder-open-o"><i class="fa-folder-open-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-smile-o" value="fa-smile-o"><label for="fa-smile-o"><i class="fa-smile-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-frown-o" value="fa-frown-o"><label for="fa-frown-o"><i class="fa-frown-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-meh-o" value="fa-meh-o"><label for="fa-meh-o"><i class="fa-meh-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-gamepad" value="fa-gamepad"><label for="fa-gamepad"><i class="fa-gamepad"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-keyboard-o" value="fa-keyboard-o"><label for="fa-keyboard-o"><i class="fa-keyboard-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-flag-o" value="fa-flag-o"><label for="fa-flag-o"><i class="fa-flag-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-flag-checkered" value="fa-flag-checkered"><label for="fa-flag-checkered"><i class="fa-flag-checkered"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-terminal" value="fa-terminal"><label for="fa-terminal"><i class="fa-terminal"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-code" value="fa-code"><label for="fa-code"><i class="fa-code"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-mail-reply-all" value="fa-mail-reply-all"><label for="fa-mail-reply-all"><i class="fa-mail-reply-all"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-reply-all" value="fa-reply-all"><label for="fa-reply-all"><i class="fa-reply-all"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-star-half-o" value="fa-star-half-o"><label for="fa-star-half-o"><i class="fa-star-half-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-location-arrow" value="fa-location-arrow"><label for="fa-location-arrow"><i class="fa-location-arrow"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-crop" value="fa-crop"><label for="fa-crop"><i class="fa-crop"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-code-fork" value="fa-code-fork"><label for="fa-code-fork"><i class="fa-code-fork"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-chain-broken" value="fa-chain-broken"><label for="fa-chain-broken"><i class="fa-chain-broken"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-question" value="fa-question"><label for="fa-question"><i class="fa-question"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-info" value="fa-info"><label for="fa-info"><i class="fa-info"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-exclamation" value="fa-exclamation"><label for="fa-exclamation"><i class="fa-exclamation"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-superscript" value="fa-superscript"><label for="fa-superscript"><i class="fa-superscript"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-subscript" value="fa-subscript"><label for="fa-subscript"><i class="fa-subscript"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-eraser" value="fa-eraser"><label for="fa-eraser"><i class="fa-eraser"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-puzzle-piece" value="fa-puzzle-piece"><label for="fa-puzzle-piece"><i class="fa-puzzle-piece"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-microphone" value="fa-microphone"><label for="fa-microphone"><i class="fa-microphone"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-microphone-slash" value="fa-microphone-slash"><label for="fa-microphone-slash"><i class="fa-microphone-slash"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-shield" value="fa-shield"><label for="fa-shield"><i class="fa-shield"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-calendar-o" value="fa-calendar-o"><label for="fa-calendar-o"><i class="fa-calendar-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-fire-extinguisher" value="fa-fire-extinguisher"><label for="fa-fire-extinguisher"><i class="fa-fire-extinguisher"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-rocket" value="fa-rocket"><label for="fa-rocket"><i class="fa-rocket"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-maxcdn" value="fa-maxcdn"><label for="fa-maxcdn"><i class="fa-maxcdn"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-chevron-circle-left" value="fa-chevron-circle-left"><label for="fa-chevron-circle-left"><i class="fa-chevron-circle-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-chevron-circle-right" value="fa-chevron-circle-right"><label for="fa-chevron-circle-right"><i class="fa-chevron-circle-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-chevron-circle-up" value="fa-chevron-circle-up"><label for="fa-chevron-circle-up"><i class="fa-chevron-circle-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-chevron-circle-down" value="fa-chevron-circle-down"><label for="fa-chevron-circle-down"><i class="fa-chevron-circle-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-html5" value="fa-html5"><label for="fa-html5"><i class="fa-html5"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-css3" value="fa-css3"><label for="fa-css3"><i class="fa-css3"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-anchor" value="fa-anchor"><label for="fa-anchor"><i class="fa-anchor"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-unlock-alt" value="fa-unlock-alt"><label for="fa-unlock-alt"><i class="fa-unlock-alt"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bullseye" value="fa-bullseye"><label for="fa-bullseye"><i class="fa-bullseye"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-ellipsis-h" value="fa-ellipsis-h"><label for="fa-ellipsis-h"><i class="fa-ellipsis-h"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-ellipsis-v" value="fa-ellipsis-v"><label for="fa-ellipsis-v"><i class="fa-ellipsis-v"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-rss-square" value="fa-rss-square"><label for="fa-rss-square"><i class="fa-rss-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-play-circle" value="fa-play-circle"><label for="fa-play-circle"><i class="fa-play-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-ticket" value="fa-ticket"><label for="fa-ticket"><i class="fa-ticket"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-minus-square" value="fa-minus-square"><label for="fa-minus-square"><i class="fa-minus-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-minus-square-o" value="fa-minus-square-o"><label for="fa-minus-square-o"><i class="fa-minus-square-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-level-up" value="fa-level-up"><label for="fa-level-up"><i class="fa-level-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-level-down" value="fa-level-down"><label for="fa-level-down"><i class="fa-level-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-check-square" value="fa-check-square"><label for="fa-check-square"><i class="fa-check-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pencil-square" value="fa-pencil-square"><label for="fa-pencil-square"><i class="fa-pencil-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-external-link-square" value="fa-external-link-square"><label for="fa-external-link-square"><i class="fa-external-link-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-share-square" value="fa-share-square"><label for="fa-share-square"><i class="fa-share-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-compass" value="fa-compass"><label for="fa-compass"><i class="fa-compass"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-toggle-down" value="fa-toggle-down"><label for="fa-toggle-down"><i class="fa-toggle-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-toggle-up" value="fa-toggle-up"><label for="fa-toggle-up"><i class="fa-toggle-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-toggle-right" value="fa-toggle-right"><label for="fa-toggle-right"><i class="fa-toggle-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-euro" value="fa-euro"><label for="fa-euro"><i class="fa-euro"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-gbp" value="fa-gbp"><label for="fa-gbp"><i class="fa-gbp"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-usd" value="fa-usd"><label for="fa-usd"><i class="fa-usd"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-rupee" value="fa-rupee"><label for="fa-rupee"><i class="fa-rupee"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cny" value="fa-cny"><label for="fa-cny"><i class="fa-cny"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-yen" value="fa-yen"><label for="fa-yen"><i class="fa-yen"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-ruble" value="fa-ruble"><label for="fa-ruble"><i class="fa-ruble"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-won" value="fa-won"><label for="fa-won"><i class="fa-won"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-btc" value="fa-btc"><label for="fa-btc"><i class="fa-btc"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file" value="fa-file"><label for="fa-file"><i class="fa-file"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file-text" value="fa-file-text"><label for="fa-file-text"><i class="fa-file-text"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sort-alpha-asc" value="fa-sort-alpha-asc"><label for="fa-sort-alpha-asc"><i class="fa-sort-alpha-asc"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sort-alpha-desc" value="fa-sort-alpha-desc"><label for="fa-sort-alpha-desc"><i class="fa-sort-alpha-desc"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sort-amount-asc" value="fa-sort-amount-asc"><label for="fa-sort-amount-asc"><i class="fa-sort-amount-asc"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sort-amount-desc" value="fa-sort-amount-desc"><label for="fa-sort-amount-desc"><i class="fa-sort-amount-desc"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sort-numeric-asc" value="fa-sort-numeric-asc"><label for="fa-sort-numeric-asc"><i class="fa-sort-numeric-asc"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sort-numeric-desc" value="fa-sort-numeric-desc"><label for="fa-sort-numeric-desc"><i class="fa-sort-numeric-desc"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-thumbs-up" value="fa-thumbs-up"><label for="fa-thumbs-up"><i class="fa-thumbs-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-thumbs-down" value="fa-thumbs-down"><label for="fa-thumbs-down"><i class="fa-thumbs-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-youtube-square" value="fa-youtube-square"><label for="fa-youtube-square"><i class="fa-youtube-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-youtube" value="fa-youtube"><label for="fa-youtube"><i class="fa-youtube"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-xing" value="fa-xing"><label for="fa-xing"><i class="fa-xing"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-xing-square" value="fa-xing-square"><label for="fa-xing-square"><i class="fa-xing-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-youtube-play" value="fa-youtube-play"><label for="fa-youtube-play"><i class="fa-youtube-play"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-dropbox" value="fa-dropbox"><label for="fa-dropbox"><i class="fa-dropbox"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-stack-overflow" value="fa-stack-overflow"><label for="fa-stack-overflow"><i class="fa-stack-overflow"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-instagram" value="fa-instagram"><label for="fa-instagram"><i class="fa-instagram"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-flickr" value="fa-flickr"><label for="fa-flickr"><i class="fa-flickr"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-adn" value="fa-adn"><label for="fa-adn"><i class="fa-adn"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bitbucket" value="fa-bitbucket"><label for="fa-bitbucket"><i class="fa-bitbucket"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bitbucket-square" value="fa-bitbucket-square"><label for="fa-bitbucket-square"><i class="fa-bitbucket-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-tumblr" value="fa-tumblr"><label for="fa-tumblr"><i class="fa-tumblr"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-tumblr-square" value="fa-tumblr-square"><label for="fa-tumblr-square"><i class="fa-tumblr-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-long-arrow-down" value="fa-long-arrow-down"><label for="fa-long-arrow-down"><i class="fa-long-arrow-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-long-arrow-up" value="fa-long-arrow-up"><label for="fa-long-arrow-up"><i class="fa-long-arrow-up"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-long-arrow-left" value="fa-long-arrow-left"><label for="fa-long-arrow-left"><i class="fa-long-arrow-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-long-arrow-right" value="fa-long-arrow-right"><label for="fa-long-arrow-right"><i class="fa-long-arrow-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-apple" value="fa-apple"><label for="fa-apple"><i class="fa-apple"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-windows" value="fa-windows"><label for="fa-windows"><i class="fa-windows"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-android" value="fa-android"><label for="fa-android"><i class="fa-android"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-linux" value="fa-linux"><label for="fa-linux"><i class="fa-linux"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-dribbble" value="fa-dribbble"><label for="fa-dribbble"><i class="fa-dribbble"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-skype" value="fa-skype"><label for="fa-skype"><i class="fa-skype"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-foursquare" value="fa-foursquare"><label for="fa-foursquare"><i class="fa-foursquare"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-trello" value="fa-trello"><label for="fa-trello"><i class="fa-trello"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-female" value="fa-female"><label for="fa-female"><i class="fa-female"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-male" value="fa-male"><label for="fa-male"><i class="fa-male"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-gratipay" value="fa-gratipay"><label for="fa-gratipay"><i class="fa-gratipay"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sun-o" value="fa-sun-o"><label for="fa-sun-o"><i class="fa-sun-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-moon-o" value="fa-moon-o"><label for="fa-moon-o"><i class="fa-moon-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-archive" value="fa-archive"><label for="fa-archive"><i class="fa-archive"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bug" value="fa-bug"><label for="fa-bug"><i class="fa-bug"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-vk" value="fa-vk"><label for="fa-vk"><i class="fa-vk"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-weibo" value="fa-weibo"><label for="fa-weibo"><i class="fa-weibo"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-renren" value="fa-renren"><label for="fa-renren"><i class="fa-renren"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pagelines" value="fa-pagelines"><label for="fa-pagelines"><i class="fa-pagelines"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-stack-exchange" value="fa-stack-exchange"><label for="fa-stack-exchange"><i class="fa-stack-exchange"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrow-circle-o-right" value="fa-arrow-circle-o-right"><label for="fa-arrow-circle-o-right"><i class="fa-arrow-circle-o-right"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-arrow-circle-o-left" value="fa-arrow-circle-o-left"><label for="fa-arrow-circle-o-left"><i class="fa-arrow-circle-o-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-toggle-left" value="fa-toggle-left"><label for="fa-toggle-left"><i class="fa-toggle-left"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-dot-circle-o" value="fa-dot-circle-o"><label for="fa-dot-circle-o"><i class="fa-dot-circle-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-wheelchair" value="fa-wheelchair"><label for="fa-wheelchair"><i class="fa-wheelchair"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-vimeo-square" value="fa-vimeo-square"><label for="fa-vimeo-square"><i class="fa-vimeo-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-turkish-lira" value="fa-turkish-lira"><label for="fa-turkish-lira"><i class="fa-turkish-lira"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-plus-square-o" value="fa-plus-square-o"><label for="fa-plus-square-o"><i class="fa-plus-square-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-space-shuttle" value="fa-space-shuttle"><label for="fa-space-shuttle"><i class="fa-space-shuttle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-slack" value="fa-slack"><label for="fa-slack"><i class="fa-slack"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-envelope-square" value="fa-envelope-square"><label for="fa-envelope-square"><i class="fa-envelope-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-wordpress" value="fa-wordpress"><label for="fa-wordpress"><i class="fa-wordpress"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-openid" value="fa-openid"><label for="fa-openid"><i class="fa-openid"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-university" value="fa-university"><label for="fa-university"><i class="fa-university"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-mortar-board" value="fa-mortar-board"><label for="fa-mortar-board"><i class="fa-mortar-board"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-yahoo" value="fa-yahoo"><label for="fa-yahoo"><i class="fa-yahoo"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-google" value="fa-google"><label for="fa-google"><i class="fa-google"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-reddit" value="fa-reddit"><label for="fa-reddit"><i class="fa-reddit"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-reddit-square" value="fa-reddit-square"><label for="fa-reddit-square"><i class="fa-reddit-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-stumbleupon-circle" value="fa-stumbleupon-circle"><label for="fa-stumbleupon-circle"><i class="fa-stumbleupon-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-stumbleupon" value="fa-stumbleupon"><label for="fa-stumbleupon"><i class="fa-stumbleupon"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-delicious" value="fa-delicious"><label for="fa-delicious"><i class="fa-delicious"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-digg" value="fa-digg"><label for="fa-digg"><i class="fa-digg"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pied-piper" value="fa-pied-piper"><label for="fa-pied-piper"><i class="fa-pied-piper"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pied-piper-alt" value="fa-pied-piper-alt"><label for="fa-pied-piper-alt"><i class="fa-pied-piper-alt"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-drupal" value="fa-drupal"><label for="fa-drupal"><i class="fa-drupal"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-joomla" value="fa-joomla"><label for="fa-joomla"><i class="fa-joomla"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-language" value="fa-language"><label for="fa-language"><i class="fa-language"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-fax" value="fa-fax"><label for="fa-fax"><i class="fa-fax"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-building" value="fa-building"><label for="fa-building"><i class="fa-building"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-child" value="fa-child"><label for="fa-child"><i class="fa-child"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-paw" value="fa-paw"><label for="fa-paw"><i class="fa-paw"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-spoon" value="fa-spoon"><label for="fa-spoon"><i class="fa-spoon"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cube" value="fa-cube"><label for="fa-cube"><i class="fa-cube"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cubes" value="fa-cubes"><label for="fa-cubes"><i class="fa-cubes"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-behance" value="fa-behance"><label for="fa-behance"><i class="fa-behance"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-behance-square" value="fa-behance-square"><label for="fa-behance-square"><i class="fa-behance-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-steam" value="fa-steam"><label for="fa-steam"><i class="fa-steam"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-steam-square" value="fa-steam-square"><label for="fa-steam-square"><i class="fa-steam-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-recycle" value="fa-recycle"><label for="fa-recycle"><i class="fa-recycle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-car" value="fa-car"><label for="fa-car"><i class="fa-car"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-taxi" value="fa-taxi"><label for="fa-taxi"><i class="fa-taxi"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-tree" value="fa-tree"><label for="fa-tree"><i class="fa-tree"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-spotify" value="fa-spotify"><label for="fa-spotify"><i class="fa-spotify"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-deviantart" value="fa-deviantart"><label for="fa-deviantart"><i class="fa-deviantart"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-soundcloud" value="fa-soundcloud"><label for="fa-soundcloud"><i class="fa-soundcloud"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-database" value="fa-database"><label for="fa-database"><i class="fa-database"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file-pdf-o" value="fa-file-pdf-o"><label for="fa-file-pdf-o"><i class="fa-file-pdf-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file-word-o" value="fa-file-word-o"><label for="fa-file-word-o"><i class="fa-file-word-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file-excel-o" value="fa-file-excel-o"><label for="fa-file-excel-o"><i class="fa-file-excel-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file-powerpoint-o" value="fa-file-powerpoint-o"><label for="fa-file-powerpoint-o"><i class="fa-file-powerpoint-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file-picture-o" value="fa-file-picture-o"><label for="fa-file-picture-o"><i class="fa-file-picture-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file-zip-o" value="fa-file-zip-o"><label for="fa-file-zip-o"><i class="fa-file-zip-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file-sound-o" value="fa-file-sound-o"><label for="fa-file-sound-o"><i class="fa-file-sound-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file-video-o" value="fa-file-video-o"><label for="fa-file-video-o"><i class="fa-file-video-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-file-code-o" value="fa-file-code-o"><label for="fa-file-code-o"><i class="fa-file-code-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-vine" value="fa-vine"><label for="fa-vine"><i class="fa-vine"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-codepen" value="fa-codepen"><label for="fa-codepen"><i class="fa-codepen"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-jsfiddle" value="fa-jsfiddle"><label for="fa-jsfiddle"><i class="fa-jsfiddle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-support" value="fa-support"><label for="fa-support"><i class="fa-support"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-circle-o-notch" value="fa-circle-o-notch"><label for="fa-circle-o-notch"><i class="fa-circle-o-notch"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-rebel" value="fa-rebel"><label for="fa-rebel"><i class="fa-rebel"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-ge" value="fa-ge"><label for="fa-ge"><i class="fa-ge"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-git-square" value="fa-git-square"><label for="fa-git-square"><i class="fa-git-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-git" value="fa-git"><label for="fa-git"><i class="fa-git"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-yc-square" value="fa-yc-square"><label for="fa-yc-square"><i class="fa-yc-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-tencent-weibo" value="fa-tencent-weibo"><label for="fa-tencent-weibo"><i class="fa-tencent-weibo"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-qq" value="fa-qq"><label for="fa-qq"><i class="fa-qq"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-weixin" value="fa-weixin"><label for="fa-weixin"><i class="fa-weixin"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-send" value="fa-send"><label for="fa-send"><i class="fa-send"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-send-o" value="fa-send-o"><label for="fa-send-o"><i class="fa-send-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-history" value="fa-history"><label for="fa-history"><i class="fa-history"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-circle-thin" value="fa-circle-thin"><label for="fa-circle-thin"><i class="fa-circle-thin"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-header" value="fa-header"><label for="fa-header"><i class="fa-header"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-paragraph" value="fa-paragraph"><label for="fa-paragraph"><i class="fa-paragraph"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sliders" value="fa-sliders"><label for="fa-sliders"><i class="fa-sliders"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-share-alt" value="fa-share-alt"><label for="fa-share-alt"><i class="fa-share-alt"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-share-alt-square" value="fa-share-alt-square"><label for="fa-share-alt-square"><i class="fa-share-alt-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bomb" value="fa-bomb"><label for="fa-bomb"><i class="fa-bomb"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-soccer-ball-o" value="fa-soccer-ball-o"><label for="fa-soccer-ball-o"><i class="fa-soccer-ball-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-tty" value="fa-tty"><label for="fa-tty"><i class="fa-tty"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-binoculars" value="fa-binoculars"><label for="fa-binoculars"><i class="fa-binoculars"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-plug" value="fa-plug"><label for="fa-plug"><i class="fa-plug"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-slideshare" value="fa-slideshare"><label for="fa-slideshare"><i class="fa-slideshare"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-twitch" value="fa-twitch"><label for="fa-twitch"><i class="fa-twitch"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-yelp" value="fa-yelp"><label for="fa-yelp"><i class="fa-yelp"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-newspaper-o" value="fa-newspaper-o"><label for="fa-newspaper-o"><i class="fa-newspaper-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-wifi" value="fa-wifi"><label for="fa-wifi"><i class="fa-wifi"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-calculator" value="fa-calculator"><label for="fa-calculator"><i class="fa-calculator"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-paypal" value="fa-paypal"><label for="fa-paypal"><i class="fa-paypal"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-google-wallet" value="fa-google-wallet"><label for="fa-google-wallet"><i class="fa-google-wallet"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cc-visa" value="fa-cc-visa"><label for="fa-cc-visa"><i class="fa-cc-visa"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cc-mastercard" value="fa-cc-mastercard"><label for="fa-cc-mastercard"><i class="fa-cc-mastercard"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cc-discover" value="fa-cc-discover"><label for="fa-cc-discover"><i class="fa-cc-discover"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cc-amex" value="fa-cc-amex"><label for="fa-cc-amex"><i class="fa-cc-amex"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cc-paypal" value="fa-cc-paypal"><label for="fa-cc-paypal"><i class="fa-cc-paypal"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cc-stripe" value="fa-cc-stripe"><label for="fa-cc-stripe"><i class="fa-cc-stripe"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bell-slash" value="fa-bell-slash"><label for="fa-bell-slash"><i class="fa-bell-slash"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bell-slash-o" value="fa-bell-slash-o"><label for="fa-bell-slash-o"><i class="fa-bell-slash-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-trash" value="fa-trash"><label for="fa-trash"><i class="fa-trash"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-copyright" value="fa-copyright"><label for="fa-copyright"><i class="fa-copyright"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-at" value="fa-at"><label for="fa-at"><i class="fa-at"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-eyedropper" value="fa-eyedropper"><label for="fa-eyedropper"><i class="fa-eyedropper"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-paint-brush" value="fa-paint-brush"><label for="fa-paint-brush"><i class="fa-paint-brush"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-birthday-cake" value="fa-birthday-cake"><label for="fa-birthday-cake"><i class="fa-birthday-cake"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-area-chart" value="fa-area-chart"><label for="fa-area-chart"><i class="fa-area-chart"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pie-chart" value="fa-pie-chart"><label for="fa-pie-chart"><i class="fa-pie-chart"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-line-chart" value="fa-line-chart"><label for="fa-line-chart"><i class="fa-line-chart"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-lastfm" value="fa-lastfm"><label for="fa-lastfm"><i class="fa-lastfm"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-lastfm-square" value="fa-lastfm-square"><label for="fa-lastfm-square"><i class="fa-lastfm-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-toggle-off" value="fa-toggle-off"><label for="fa-toggle-off"><i class="fa-toggle-off"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-toggle-on" value="fa-toggle-on"><label for="fa-toggle-on"><i class="fa-toggle-on"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bicycle" value="fa-bicycle"><label for="fa-bicycle"><i class="fa-bicycle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bus" value="fa-bus"><label for="fa-bus"><i class="fa-bus"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-ioxhost" value="fa-ioxhost"><label for="fa-ioxhost"><i class="fa-ioxhost"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-angellist" value="fa-angellist"><label for="fa-angellist"><i class="fa-angellist"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cc" value="fa-cc"><label for="fa-cc"><i class="fa-cc"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sheqel" value="fa-sheqel"><label for="fa-sheqel"><i class="fa-sheqel"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-meanpath" value="fa-meanpath"><label for="fa-meanpath"><i class="fa-meanpath"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-buysellads" value="fa-buysellads"><label for="fa-buysellads"><i class="fa-buysellads"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-connectdevelop" value="fa-connectdevelop"><label for="fa-connectdevelop"><i class="fa-connectdevelop"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-dashcube" value="fa-dashcube"><label for="fa-dashcube"><i class="fa-dashcube"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-forumbee" value="fa-forumbee"><label for="fa-forumbee"><i class="fa-forumbee"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-leanpub" value="fa-leanpub"><label for="fa-leanpub"><i class="fa-leanpub"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sellsy" value="fa-sellsy"><label for="fa-sellsy"><i class="fa-sellsy"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-shirtsinbulk" value="fa-shirtsinbulk"><label for="fa-shirtsinbulk"><i class="fa-shirtsinbulk"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-simplybuilt" value="fa-simplybuilt"><label for="fa-simplybuilt"><i class="fa-simplybuilt"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-skyatlas" value="fa-skyatlas"><label for="fa-skyatlas"><i class="fa-skyatlas"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cart-plus" value="fa-cart-plus"><label for="fa-cart-plus"><i class="fa-cart-plus"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cart-arrow-down" value="fa-cart-arrow-down"><label for="fa-cart-arrow-down"><i class="fa-cart-arrow-down"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-diamond" value="fa-diamond"><label for="fa-diamond"><i class="fa-diamond"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-ship" value="fa-ship"><label for="fa-ship"><i class="fa-ship"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-user-secret" value="fa-user-secret"><label for="fa-user-secret"><i class="fa-user-secret"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-motorcycle" value="fa-motorcycle"><label for="fa-motorcycle"><i class="fa-motorcycle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-street-view" value="fa-street-view"><label for="fa-street-view"><i class="fa-street-view"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-heartbeat" value="fa-heartbeat"><label for="fa-heartbeat"><i class="fa-heartbeat"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-venus" value="fa-venus"><label for="fa-venus"><i class="fa-venus"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-mars" value="fa-mars"><label for="fa-mars"><i class="fa-mars"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-mercury" value="fa-mercury"><label for="fa-mercury"><i class="fa-mercury"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-intersex" value="fa-intersex"><label for="fa-intersex"><i class="fa-intersex"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-transgender" value="fa-transgender"><label for="fa-transgender"><i class="fa-transgender"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-transgender-alt" value="fa-transgender-alt"><label for="fa-transgender-alt"><i class="fa-transgender-alt"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-venus-double" value="fa-venus-double"><label for="fa-venus-double"><i class="fa-venus-double"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-mars-double" value="fa-mars-double"><label for="fa-mars-double"><i class="fa-mars-double"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-venus-mars" value="fa-venus-mars"><label for="fa-venus-mars"><i class="fa-venus-mars"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-mars-stroke" value="fa-mars-stroke"><label for="fa-mars-stroke"><i class="fa-mars-stroke"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-mars-stroke-v" value="fa-mars-stroke-v"><label for="fa-mars-stroke-v"><i class="fa-mars-stroke-v"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-mars-stroke-h" value="fa-mars-stroke-h"><label for="fa-mars-stroke-h"><i class="fa-mars-stroke-h"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-neuter" value="fa-neuter"><label for="fa-neuter"><i class="fa-neuter"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-genderless" value="fa-genderless"><label for="fa-genderless"><i class="fa-genderless"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-facebook-official" value="fa-facebook-official"><label for="fa-facebook-official"><i class="fa-facebook-official"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pinterest-p" value="fa-pinterest-p"><label for="fa-pinterest-p"><i class="fa-pinterest-p"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-whatsapp" value="fa-whatsapp"><label for="fa-whatsapp"><i class="fa-whatsapp"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-server" value="fa-server"><label for="fa-server"><i class="fa-server"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-user-plus" value="fa-user-plus"><label for="fa-user-plus"><i class="fa-user-plus"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-user-times" value="fa-user-times"><label for="fa-user-times"><i class="fa-user-times"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hotel" value="fa-hotel"><label for="fa-hotel"><i class="fa-hotel"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-viacoin" value="fa-viacoin"><label for="fa-viacoin"><i class="fa-viacoin"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-train" value="fa-train"><label for="fa-train"><i class="fa-train"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-subway" value="fa-subway"><label for="fa-subway"><i class="fa-subway"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-medium" value="fa-medium"><label for="fa-medium"><i class="fa-medium"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-yc" value="fa-yc"><label for="fa-yc"><i class="fa-yc"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-optin-monster" value="fa-optin-monster"><label for="fa-optin-monster"><i class="fa-optin-monster"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-opencart" value="fa-opencart"><label for="fa-opencart"><i class="fa-opencart"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-expeditedssl" value="fa-expeditedssl"><label for="fa-expeditedssl"><i class="fa-expeditedssl"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-battery-full" value="fa-battery-full"><label for="fa-battery-full"><i class="fa-battery-full"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-battery-three-quarters" value="fa-battery-three-quarters"><label for="fa-battery-three-quarters"><i class="fa-battery-three-quarters"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-battery-half" value="fa-battery-half"><label for="fa-battery-half"><i class="fa-battery-half"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-battery-quarter" value="fa-battery-quarter"><label for="fa-battery-quarter"><i class="fa-battery-quarter"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-battery-empty" value="fa-battery-empty"><label for="fa-battery-empty"><i class="fa-battery-empty"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-mouse-pointer" value="fa-mouse-pointer"><label for="fa-mouse-pointer"><i class="fa-mouse-pointer"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-i-cursor" value="fa-i-cursor"><label for="fa-i-cursor"><i class="fa-i-cursor"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-object-group" value="fa-object-group"><label for="fa-object-group"><i class="fa-object-group"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-object-ungroup" value="fa-object-ungroup"><label for="fa-object-ungroup"><i class="fa-object-ungroup"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sticky-note" value="fa-sticky-note"><label for="fa-sticky-note"><i class="fa-sticky-note"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-sticky-note-o" value="fa-sticky-note-o"><label for="fa-sticky-note-o"><i class="fa-sticky-note-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cc-jcb" value="fa-cc-jcb"><label for="fa-cc-jcb"><i class="fa-cc-jcb"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-cc-diners-club" value="fa-cc-diners-club"><label for="fa-cc-diners-club"><i class="fa-cc-diners-club"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-clone" value="fa-clone"><label for="fa-clone"><i class="fa-clone"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-balance-scale" value="fa-balance-scale"><label for="fa-balance-scale"><i class="fa-balance-scale"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hourglass-o" value="fa-hourglass-o"><label for="fa-hourglass-o"><i class="fa-hourglass-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hourglass-start" value="fa-hourglass-start"><label for="fa-hourglass-start"><i class="fa-hourglass-start"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hourglass-half" value="fa-hourglass-half"><label for="fa-hourglass-half"><i class="fa-hourglass-half"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hourglass-end" value="fa-hourglass-end"><label for="fa-hourglass-end"><i class="fa-hourglass-end"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hourglass" value="fa-hourglass"><label for="fa-hourglass"><i class="fa-hourglass"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hand-rock-o" value="fa-hand-rock-o"><label for="fa-hand-rock-o"><i class="fa-hand-rock-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hand-stop-o" value="fa-hand-stop-o"><label for="fa-hand-stop-o"><i class="fa-hand-stop-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hand-scissors-o" value="fa-hand-scissors-o"><label for="fa-hand-scissors-o"><i class="fa-hand-scissors-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hand-lizard-o" value="fa-hand-lizard-o"><label for="fa-hand-lizard-o"><i class="fa-hand-lizard-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hand-spock-o" value="fa-hand-spock-o"><label for="fa-hand-spock-o"><i class="fa-hand-spock-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hand-pointer-o" value="fa-hand-pointer-o"><label for="fa-hand-pointer-o"><i class="fa-hand-pointer-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hand-peace-o" value="fa-hand-peace-o"><label for="fa-hand-peace-o"><i class="fa-hand-peace-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-trademark" value="fa-trademark"><label for="fa-trademark"><i class="fa-trademark"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-registered" value="fa-registered"><label for="fa-registered"><i class="fa-registered"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-creative-commons" value="fa-creative-commons"><label for="fa-creative-commons"><i class="fa-creative-commons"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-gg" value="fa-gg"><label for="fa-gg"><i class="fa-gg"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-gg-circle" value="fa-gg-circle"><label for="fa-gg-circle"><i class="fa-gg-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-tripadvisor" value="fa-tripadvisor"><label for="fa-tripadvisor"><i class="fa-tripadvisor"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-odnoklassniki" value="fa-odnoklassniki"><label for="fa-odnoklassniki"><i class="fa-odnoklassniki"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-odnoklassniki-square" value="fa-odnoklassniki-square"><label for="fa-odnoklassniki-square"><i class="fa-odnoklassniki-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-get-pocket" value="fa-get-pocket"><label for="fa-get-pocket"><i class="fa-get-pocket"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-wikipedia-w" value="fa-wikipedia-w"><label for="fa-wikipedia-w"><i class="fa-wikipedia-w"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-safari" value="fa-safari"><label for="fa-safari"><i class="fa-safari"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-chrome" value="fa-chrome"><label for="fa-chrome"><i class="fa-chrome"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-firefox" value="fa-firefox"><label for="fa-firefox"><i class="fa-firefox"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-opera" value="fa-opera"><label for="fa-opera"><i class="fa-opera"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-internet-explorer" value="fa-internet-explorer"><label for="fa-internet-explorer"><i class="fa-internet-explorer"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-tv" value="fa-tv"><label for="fa-tv"><i class="fa-tv"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-contao" value="fa-contao"><label for="fa-contao"><i class="fa-contao"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-500px" value="fa-500px"><label for="fa-500px"><i class="fa-500px"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-amazon" value="fa-amazon"><label for="fa-amazon"><i class="fa-amazon"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-calendar-plus-o" value="fa-calendar-plus-o"><label for="fa-calendar-plus-o"><i class="fa-calendar-plus-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-calendar-minus-o" value="fa-calendar-minus-o"><label for="fa-calendar-minus-o"><i class="fa-calendar-minus-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-calendar-times-o" value="fa-calendar-times-o"><label for="fa-calendar-times-o"><i class="fa-calendar-times-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-calendar-check-o" value="fa-calendar-check-o"><label for="fa-calendar-check-o"><i class="fa-calendar-check-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-industry" value="fa-industry"><label for="fa-industry"><i class="fa-industry"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-map-pin" value="fa-map-pin"><label for="fa-map-pin"><i class="fa-map-pin"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-map-signs" value="fa-map-signs"><label for="fa-map-signs"><i class="fa-map-signs"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-map-o" value="fa-map-o"><label for="fa-map-o"><i class="fa-map-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-map" value="fa-map"><label for="fa-map"><i class="fa-map"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-commenting" value="fa-commenting"><label for="fa-commenting"><i class="fa-commenting"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-commenting-o" value="fa-commenting-o"><label for="fa-commenting-o"><i class="fa-commenting-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-houzz" value="fa-houzz"><label for="fa-houzz"><i class="fa-houzz"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-vimeo" value="fa-vimeo"><label for="fa-vimeo"><i class="fa-vimeo"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-black-tie" value="fa-black-tie"><label for="fa-black-tie"><i class="fa-black-tie"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-fonticons" value="fa-fonticons"><label for="fa-fonticons"><i class="fa-fonticons"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-reddit-alien" value="fa-reddit-alien"><label for="fa-reddit-alien"><i class="fa-reddit-alien"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-edge" value="fa-edge"><label for="fa-edge"><i class="fa-edge"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-credit-card-alt" value="fa-credit-card-alt"><label for="fa-credit-card-alt"><i class="fa-credit-card-alt"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-codiepie" value="fa-codiepie"><label for="fa-codiepie"><i class="fa-codiepie"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-modx" value="fa-modx"><label for="fa-modx"><i class="fa-modx"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-fort-awesome" value="fa-fort-awesome"><label for="fa-fort-awesome"><i class="fa-fort-awesome"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-usb" value="fa-usb"><label for="fa-usb"><i class="fa-usb"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-product-hunt" value="fa-product-hunt"><label for="fa-product-hunt"><i class="fa-product-hunt"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-mixcloud" value="fa-mixcloud"><label for="fa-mixcloud"><i class="fa-mixcloud"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-scribd" value="fa-scribd"><label for="fa-scribd"><i class="fa-scribd"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pause-circle" value="fa-pause-circle"><label for="fa-pause-circle"><i class="fa-pause-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-pause-circle-o" value="fa-pause-circle-o"><label for="fa-pause-circle-o"><i class="fa-pause-circle-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-stop-circle" value="fa-stop-circle"><label for="fa-stop-circle"><i class="fa-stop-circle"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-stop-circle-o" value="fa-stop-circle-o"><label for="fa-stop-circle-o"><i class="fa-stop-circle-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-shopping-bag" value="fa-shopping-bag"><label for="fa-shopping-bag"><i class="fa-shopping-bag"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-shopping-basket" value="fa-shopping-basket"><label for="fa-shopping-basket"><i class="fa-shopping-basket"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hashtag" value="fa-hashtag"><label for="fa-hashtag"><i class="fa-hashtag"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bluetooth" value="fa-bluetooth"><label for="fa-bluetooth"><i class="fa-bluetooth"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-bluetooth-b" value="fa-bluetooth-b"><label for="fa-bluetooth-b"><i class="fa-bluetooth-b"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-percent" value="fa-percent"><label for="fa-percent"><i class="fa-percent"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-gitlab" value="fa-gitlab"><label for="fa-gitlab"><i class="fa-gitlab"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-wpbeginner" value="fa-wpbeginner"><label for="fa-wpbeginner"><i class="fa-wpbeginner"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-wpforms" value="fa-wpforms"><label for="fa-wpforms"><i class="fa-wpforms"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-envira" value="fa-envira"><label for="fa-envira"><i class="fa-envira"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-universal-access" value="fa-universal-access"><label for="fa-universal-access"><i class="fa-universal-access"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-wheelchair-alt" value="fa-wheelchair-alt"><label for="fa-wheelchair-alt"><i class="fa-wheelchair-alt"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-question-circle-o" value="fa-question-circle-o"><label for="fa-question-circle-o"><i class="fa-question-circle-o"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-blind" value="fa-blind"><label for="fa-blind"><i class="fa-blind"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-audio-description" value="fa-audio-description"><label for="fa-audio-description"><i class="fa-audio-description"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-volume-control-phone" value="fa-volume-control-phone"><label for="fa-volume-control-phone"><i class="fa-volume-control-phone"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-braille" value="fa-braille"><label for="fa-braille"><i class="fa-braille"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-assistive-listening-systems" value="fa-assistive-listening-systems"><label for="fa-assistive-listening-systems"><i class="fa-assistive-listening-systems"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-american-sign-language-interpreting" value="fa-american-sign-language-interpreting"><label for="fa-american-sign-language-interpreting"><i class="fa-american-sign-language-interpreting"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-hard-of-hearing" value="fa-hard-of-hearing"><label for="fa-hard-of-hearing"><i class="fa-hard-of-hearing"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-glide" value="fa-glide"><label for="fa-glide"><i class="fa-glide"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-glide-g" value="fa-glide-g"><label for="fa-glide-g"><i class="fa-glide-g"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-signing" value="fa-signing"><label for="fa-signing"><i class="fa-signing"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-low-vision" value="fa-low-vision"><label for="fa-low-vision"><i class="fa-low-vision"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-viadeo" value="fa-viadeo"><label for="fa-viadeo"><i class="fa-viadeo"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-viadeo-square" value="fa-viadeo-square"><label for="fa-viadeo-square"><i class="fa-viadeo-square"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-snapchat" value="fa-snapchat"><label for="fa-snapchat"><i class="fa-snapchat"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-snapchat-ghost" value="fa-snapchat-ghost"><label for="fa-snapchat-ghost"><i class="fa-snapchat-ghost"></i></label></li><li><input type="radio" name="iconfonts_name" id="fa-snapchat-square" value="fa-snapchat-square"><label for="fa-snapchat-square"><i class="fa-snapchat-square"></i></label></li></ul></div><div class="webnus-icons-buttons"><button id="webnus-icons-getcode">Insert Icon</button></div></div>');
        form.find("#webnus-icons-colorpicker").wpColorPicker();
        var table = form.find('table');
        form.appendTo('body').hide();
        // handles the click event of the submit button
        form.find('#webnus-icons-getcode').click(function() {
            var icomoon_color = table.find("#webnus-icons-colorpicker").val();
            var icomoon_url = ' link="'+table.find("#webnus-icons-url").val()+'"';
            var icomoon_size = table.find("#webnus-icons-size").val();
            var icomoon_class =jQuery('input[name="iconfonts_name"]:checked').val();
            if(icomoon_color)
             tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon name="'+icomoon_class+'" size="'+icomoon_size+'" color="'+icomoon_color+'"'+ icomoon_url +']');
            else
             tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[icon name="'+icomoon_class+'" size="'+icomoon_size+'"'+ icomoon_url +']');
            // closes Thickbox
            tb_remove();
        });
    }
})(jQuery);
/**
        PictureBox
**/
(function() {
    tinymce.create('tinymce.plugins.doublepromo', {
        init: function(ed, url) {
            ed.addButton('doublepromo', {
                title: 'Double Promo',
                image: url + '/doublepromo-ico.png',
                onclick: function() {
                    
                    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[doublepromo title="Title Goes Here" Text="Sample Text" link_text="Read More" link_link="#" img="" img_alt="" last="false"][doublepromo title="Title Goes Here" Text="Sample Text" link_text="Read More" link_link="#" img="" img_alt="" last="true"]');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('doublepromo', tinymce.plugins.doublepromo);
})(jQuery);
/*
        QUOTE
*/
(function() {
    tinymce.create('tinymce.plugins.quote', {
        init: function(ed, url) {
            ed.addButton('quote', {
                title: 'Quote of the Week',
                image: url + '/qotofweek-ico.png',
                onclick: function() {         
                    tinyMCE.activeEditor.execCommand('mceInsertContent', 0, '[quote title="Title" Text="text" name="Name" name_sub="Name Sub"]');
                }
            });
        },
        createControl: function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('quote', tinymce.plugins.quote);
})(jQuery);
(function($) {
    $.fn.extend({
        center: function() {
            return this.each(function() {
                var top = ($(window).height() - $(this).outerHeight()) / 2;
                var left = ($(window).width() - $(this).outerWidth()) / 2;
                $(this).css({position: 'absolute', margin: 0, top: (top > 0 ? top : 0) + 'px', left: (left > 0 ? left : 0) + 'px'});
            });
        }
    });
})(jQuery);