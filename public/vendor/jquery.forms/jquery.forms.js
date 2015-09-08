/*
 *	ElementTable v1.1 - 2015-09-1
 *	(c) 2015 Syscover S.L. - http://www.syscover.com/
 *	All rights reserved
 */

"use strict";

(function ($) {
    var Forms = {
        options: {
            debug: false,
            appName: 'pulsar',
            ajax: false,
            id: null,
            cleanFields: true,
            fields: {
                subject: 'subject',
                name: 'name',
                surname: 'surname',
                company: 'company',
                email: 'email',
                data: []
            },
            redirectOk: null
        },
        callback: null,
        item: null,
        properties: {
            hasHandlerFormsSubmit: false
        },

        init: function(options, callback, item)
        {
            var that = this;

            // extend options.fields
            if(options.fields != undefined)
            {
                options.fields = $.extend({}, this.options.fields, options.fields || {});
            }

            // Extend options load
            this.options = $.extend({}, this.options, options||{});
            this.item = item;
            this.callback = callback;

            if(this.options.id == null)
            {
                if(this.options.debug) console.error('Need implement id paramenter');
                throw {
                    success: false,
                    message: 'Need implement id paramenter'
                }
            }

            $.ajax({
                url:						'/' + this.options.appName + '/forms/forms/init/form/' + this.options.id,
                type:						'GET',
                dataType:					'json',
                success: function(response)
                {
                    if(response.success)
                    {
                        $(that.item).attr('action', response.action);
                        $(that.item).prepend('<input type="hidden" name="_redirectOk">');
                        $(that.item).prepend('<input type="hidden" name="_fields">');
                        $(that.item).prepend('<input type="hidden" name="_tokenForm" value="' + response.token + '">');
                        $(that.item).prepend('<input type="hidden" name="_token" value="' + response.csfr + '">');

                        var data = [];
                        $(that.options.fields.data).each(function(){
                            if($('[name=' + this + ']').prop("type") != undefined)
                            {
                                var obj = {type: $('[name=' + this + ']').prop("type"), name: this};
                                if($('[name=' + this + ']').data('length') != undefined)
                                {
                                    obj.length = $('[name=' + this + ']').data('length');
                                }
                                if($('[name=' + this + ']').data('label') != undefined)
                                {
                                    obj.label = $('[name=' + this + ']').data('label');
                                }
                                data.push(obj);
                            }
                        });

                        that.options.fields.data = data;

                        $("[name=_fields]", that.item).val(JSON.stringify(that.options.fields));
                        $("[name=_redirectOk]", that.item).val(that.options.redirectOk);
                    }
                    else
                    {
                        if(that.options.debug) console.error(response.message);
                        throw response;
                    }
                }
            });


            // set onSubmit handler
            $(this.item).on('submit', function(event){
                event.preventDefault();

                // check if form contain recaptcha element
                if($(that.item).find('[name=g-recaptcha-response]').length > 0)
                {
                    $.ajax({
                        url:  '/' + that.options.appName + '/forms/google/recaptcha/verify',
                        type: 'POST',
                        data: {
                            '_token': $(event.target).find('[name=_token]').val(),
                            'g-recaptcha-response': $(event.target).find('[name=g-recaptcha-response]').val()
                        },
                        dataType: 'json',
                        success: function(response)
                        {
                            if(response.success)
                            {
                                // fire event forms:submit
                                that.setFormsSubmitEvent();
                                that.item.trigger('forms:submit');
                            }
                            else
                            {
                                //error from captcha
                                that.item.trigger('forms:error', {
                                    success: false,
                                    nativeError: response
                                });
                            }
                        },
                        error: function(error)
                        {
                            that.item.trigger('forms:error', {
                                success: false,
                                nativeError: error
                            });
                        }
                    });
                }
                else
                {
                    // fire event forms:submit
                    that.setFormsSubmitEvent();
                    that.item.trigger('forms:submit');
                }
            });

            return this;
        },

        setFormsSubmitEvent: function()
        {
            var that = this;

            // check if handler was create
            if(!this.properties.hasHandlerFormsSubmit)
            {
                // add handler event to only one execution
                $(this.item).on('forms:submit', function(event) {
                    if(!event.isDefaultPrevented())
                    {
                        if(that.options.ajax)
                        {
                            that.submit();
                        }
                        else
                        {
                            that.item.off('submit');
                            that.item.submit();
                        }

                        that.properties.hasHandlerFormsSubmit = true;
                    }
                });
            }
        },

        submit: function(){
            var that = this;

            $.ajax({
                url:						this.item.attr('action'),
                data:                       this.item.serializeArray(),
                type:						this.item.attr('method'),
                dataType:					'json',
                success: function(response)
                {
                    if($.isFunction(that.callback))
                    {
                        if(that.options.cleanFields)
                        {
                            $('[name=' + that.options.fields.subject + ']').val('');
                            $('[name=' + that.options.fields.name + ']').val('');
                            $('[name=' + that.options.fields.surname + ']').val('');
                            $('[name=' + that.options.fields.company + ']').val('');
                            $('[name=' + that.options.fields.email + ']').val('');
                            $('[name=' + that.options.fields.date + ']').val('');
                            $('[name=' + that.options.fields.cp + ']').val('');
                            $('[name=' + that.options.fields.locality + ']').val('');
                            $('[name=' + that.options.fields.address + ']').val('');
                            $('[name=' + that.options.fields.message + ']').val('');

                            $(that.options.fields.data).each(function(){
                                $('[name=' + this.name + ']').val('');
                            });
                        }
                        that.callback(response);
                    }
                },
                error: function(e){
                    console.error(e);
                }
            });
        }
    };

    /*
     * Make sure Object.create is available in the browser (for our prototypal inheritance)
     * Note this is not entirely equal to native Object.create, but compatible with our use-case
     */
    if (typeof Object.create !== 'function')
    {
        Object.create = function (o) {
            function F() {}
            F.prototype = o;
            return new F();
        };
    }

    /*
     * Start the plugin
     */
    $.fn.forms = function(options, callback) {

        if (!this.data('forms'))
        {
            return this.data('forms', Object.create(Forms).init(options, callback, this));
        }
        else
        {
            return this.data('forms');
        }
    };

}( jQuery ));