
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">Syscover</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Syscover_Forms" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Forms.html">Forms</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Syscover_Forms_Controllers" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Forms/Controllers.html">Controllers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Syscover_Forms_Controllers_CommentController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Controllers/CommentController.html">CommentController</a>                    </div>                </li>                            <li data-name="class:Syscover_Forms_Controllers_FormController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Controllers/FormController.html">FormController</a>                    </div>                </li>                            <li data-name="class:Syscover_Forms_Controllers_PreferenceController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Controllers/PreferenceController.html">PreferenceController</a>                    </div>                </li>                            <li data-name="class:Syscover_Forms_Controllers_ReCaptchaController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Controllers/ReCaptchaController.html">ReCaptchaController</a>                    </div>                </li>                            <li data-name="class:Syscover_Forms_Controllers_RecordController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Controllers/RecordController.html">RecordController</a>                    </div>                </li>                            <li data-name="class:Syscover_Forms_Controllers_StateController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Controllers/StateController.html">StateController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Syscover_Forms_Libraries" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Forms/Libraries.html">Libraries</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Syscover_Forms_Libraries_Cron" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Libraries/Cron.html">Cron</a>                    </div>                </li>                            <li data-name="class:Syscover_Forms_Libraries_Miscellaneous" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Libraries/Miscellaneous.html">Miscellaneous</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Syscover_Forms_Models" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Syscover/Forms/Models.html">Models</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Syscover_Forms_Models_Comment" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Models/Comment.html">Comment</a>                    </div>                </li>                            <li data-name="class:Syscover_Forms_Models_Form" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Models/Form.html">Form</a>                    </div>                </li>                            <li data-name="class:Syscover_Forms_Models_Forward" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Models/Forward.html">Forward</a>                    </div>                </li>                            <li data-name="class:Syscover_Forms_Models_Message" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Models/Message.html">Message</a>                    </div>                </li>                            <li data-name="class:Syscover_Forms_Models_Recipient" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Models/Recipient.html">Recipient</a>                    </div>                </li>                            <li data-name="class:Syscover_Forms_Models_Record" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Models/Record.html">Record</a>                    </div>                </li>                            <li data-name="class:Syscover_Forms_Models_State" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Syscover/Forms/Models/State.html">State</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Syscover_Forms_FormsServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Syscover/Forms/FormsServiceProvider.html">FormsServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Syscover.html", "name": "Syscover", "doc": "Namespace Syscover"},{"type": "Namespace", "link": "Syscover/Forms.html", "name": "Syscover\\Forms", "doc": "Namespace Syscover\\Forms"},{"type": "Namespace", "link": "Syscover/Forms/Controllers.html", "name": "Syscover\\Forms\\Controllers", "doc": "Namespace Syscover\\Forms\\Controllers"},{"type": "Namespace", "link": "Syscover/Forms/Libraries.html", "name": "Syscover\\Forms\\Libraries", "doc": "Namespace Syscover\\Forms\\Libraries"},{"type": "Namespace", "link": "Syscover/Forms/Models.html", "name": "Syscover\\Forms\\Models", "doc": "Namespace Syscover\\Forms\\Models"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Controllers", "fromLink": "Syscover/Forms/Controllers.html", "link": "Syscover/Forms/Controllers/CommentController.html", "name": "Syscover\\Forms\\Controllers\\CommentController", "doc": "&quot;Class CommentController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\CommentController", "fromLink": "Syscover/Forms/Controllers/CommentController.html", "link": "Syscover/Forms/Controllers/CommentController.html#method_customActionUrlParameters", "name": "Syscover\\Forms\\Controllers\\CommentController::customActionUrlParameters", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\CommentController", "fromLink": "Syscover/Forms/Controllers/CommentController.html", "link": "Syscover/Forms/Controllers/CommentController.html#method_storeCustomRecord", "name": "Syscover\\Forms\\Controllers\\CommentController::storeCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\CommentController", "fromLink": "Syscover/Forms/Controllers/CommentController.html", "link": "Syscover/Forms/Controllers/CommentController.html#method_updateCustomRecord", "name": "Syscover\\Forms\\Controllers\\CommentController::updateCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\CommentController", "fromLink": "Syscover/Forms/Controllers/CommentController.html", "link": "Syscover/Forms/Controllers/CommentController.html#method_deleteCustomRecordRedirect", "name": "Syscover\\Forms\\Controllers\\CommentController::deleteCustomRecordRedirect", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\CommentController", "fromLink": "Syscover/Forms/Controllers/CommentController.html", "link": "Syscover/Forms/Controllers/CommentController.html#method_deleteCustomRecordsRedirect", "name": "Syscover\\Forms\\Controllers\\CommentController::deleteCustomRecordsRedirect", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Controllers", "fromLink": "Syscover/Forms/Controllers.html", "link": "Syscover/Forms/Controllers/FormController.html", "name": "Syscover\\Forms\\Controllers\\FormController", "doc": "&quot;Class FormController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\FormController", "fromLink": "Syscover/Forms/Controllers/FormController.html", "link": "Syscover/Forms/Controllers/FormController.html#method_initForm", "name": "Syscover\\Forms\\Controllers\\FormController::initForm", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\FormController", "fromLink": "Syscover/Forms/Controllers/FormController.html", "link": "Syscover/Forms/Controllers/FormController.html#method_jsonCustomDataBeforeActions", "name": "Syscover\\Forms\\Controllers\\FormController::jsonCustomDataBeforeActions", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\FormController", "fromLink": "Syscover/Forms/Controllers/FormController.html", "link": "Syscover/Forms/Controllers/FormController.html#method_createCustomRecord", "name": "Syscover\\Forms\\Controllers\\FormController::createCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\FormController", "fromLink": "Syscover/Forms/Controllers/FormController.html", "link": "Syscover/Forms/Controllers/FormController.html#method_storeCustomRecord", "name": "Syscover\\Forms\\Controllers\\FormController::storeCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\FormController", "fromLink": "Syscover/Forms/Controllers/FormController.html", "link": "Syscover/Forms/Controllers/FormController.html#method_editCustomRecord", "name": "Syscover\\Forms\\Controllers\\FormController::editCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\FormController", "fromLink": "Syscover/Forms/Controllers/FormController.html", "link": "Syscover/Forms/Controllers/FormController.html#method_updateCustomRecord", "name": "Syscover\\Forms\\Controllers\\FormController::updateCustomRecord", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Controllers", "fromLink": "Syscover/Forms/Controllers.html", "link": "Syscover/Forms/Controllers/PreferenceController.html", "name": "Syscover\\Forms\\Controllers\\PreferenceController", "doc": "&quot;Class PreferenceController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\PreferenceController", "fromLink": "Syscover/Forms/Controllers/PreferenceController.html", "link": "Syscover/Forms/Controllers/PreferenceController.html#method_indexCustom", "name": "Syscover\\Forms\\Controllers\\PreferenceController::indexCustom", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\PreferenceController", "fromLink": "Syscover/Forms/Controllers/PreferenceController.html", "link": "Syscover/Forms/Controllers/PreferenceController.html#method_updateCustomRecord", "name": "Syscover\\Forms\\Controllers\\PreferenceController::updateCustomRecord", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Controllers", "fromLink": "Syscover/Forms/Controllers.html", "link": "Syscover/Forms/Controllers/ReCaptchaController.html", "name": "Syscover\\Forms\\Controllers\\ReCaptchaController", "doc": "&quot;Class ReCaptchaController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\ReCaptchaController", "fromLink": "Syscover/Forms/Controllers/ReCaptchaController.html", "link": "Syscover/Forms/Controllers/ReCaptchaController.html#method_verify", "name": "Syscover\\Forms\\Controllers\\ReCaptchaController::verify", "doc": "&quot;Function to verify captcha request&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Controllers", "fromLink": "Syscover/Forms/Controllers.html", "link": "Syscover/Forms/Controllers/RecordController.html", "name": "Syscover\\Forms\\Controllers\\RecordController", "doc": "&quot;Class RecordController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\RecordController", "fromLink": "Syscover/Forms/Controllers/RecordController.html", "link": "Syscover/Forms/Controllers/RecordController.html#method_indexCustom", "name": "Syscover\\Forms\\Controllers\\RecordController::indexCustom", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\RecordController", "fromLink": "Syscover/Forms/Controllers/RecordController.html", "link": "Syscover/Forms/Controllers/RecordController.html#method_customColumnType", "name": "Syscover\\Forms\\Controllers\\RecordController::customColumnType", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\RecordController", "fromLink": "Syscover/Forms/Controllers/RecordController.html", "link": "Syscover/Forms/Controllers/RecordController.html#method_customActionUrlParameters", "name": "Syscover\\Forms\\Controllers\\RecordController::customActionUrlParameters", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\RecordController", "fromLink": "Syscover/Forms/Controllers/RecordController.html", "link": "Syscover/Forms/Controllers/RecordController.html#method_showCustomRecord", "name": "Syscover\\Forms\\Controllers\\RecordController::showCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\RecordController", "fromLink": "Syscover/Forms/Controllers/RecordController.html", "link": "Syscover/Forms/Controllers/RecordController.html#method_addToDeleteRecord", "name": "Syscover\\Forms\\Controllers\\RecordController::addToDeleteRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\RecordController", "fromLink": "Syscover/Forms/Controllers/RecordController.html", "link": "Syscover/Forms/Controllers/RecordController.html#method_addToDeleteRecordsSelect", "name": "Syscover\\Forms\\Controllers\\RecordController::addToDeleteRecordsSelect", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\RecordController", "fromLink": "Syscover/Forms/Controllers/RecordController.html", "link": "Syscover/Forms/Controllers/RecordController.html#method_deleteRecipient", "name": "Syscover\\Forms\\Controllers\\RecordController::deleteRecipient", "doc": "&quot;Delete recipient from record&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\RecordController", "fromLink": "Syscover/Forms/Controllers/RecordController.html", "link": "Syscover/Forms/Controllers/RecordController.html#method_jsonSetStateRecordForm", "name": "Syscover\\Forms\\Controllers\\RecordController::jsonSetStateRecordForm", "doc": "&quot;Change state record&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\RecordController", "fromLink": "Syscover/Forms/Controllers/RecordController.html", "link": "Syscover/Forms/Controllers/RecordController.html#method_recordForm", "name": "Syscover\\Forms\\Controllers\\RecordController::recordForm", "doc": "&quot;Function to record a data form&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Controllers", "fromLink": "Syscover/Forms/Controllers.html", "link": "Syscover/Forms/Controllers/StateController.html", "name": "Syscover\\Forms\\Controllers\\StateController", "doc": "&quot;Class StateController&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\StateController", "fromLink": "Syscover/Forms/Controllers/StateController.html", "link": "Syscover/Forms/Controllers/StateController.html#method_storeCustomRecord", "name": "Syscover\\Forms\\Controllers\\StateController::storeCustomRecord", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Controllers\\StateController", "fromLink": "Syscover/Forms/Controllers/StateController.html", "link": "Syscover/Forms/Controllers/StateController.html#method_updateCustomRecord", "name": "Syscover\\Forms\\Controllers\\StateController::updateCustomRecord", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms", "fromLink": "Syscover/Forms.html", "link": "Syscover/Forms/FormsServiceProvider.html", "name": "Syscover\\Forms\\FormsServiceProvider", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\FormsServiceProvider", "fromLink": "Syscover/Forms/FormsServiceProvider.html", "link": "Syscover/Forms/FormsServiceProvider.html#method_boot", "name": "Syscover\\Forms\\FormsServiceProvider::boot", "doc": "&quot;Bootstrap the application services.&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\FormsServiceProvider", "fromLink": "Syscover/Forms/FormsServiceProvider.html", "link": "Syscover/Forms/FormsServiceProvider.html#method_register", "name": "Syscover\\Forms\\FormsServiceProvider::register", "doc": "&quot;Register the application services.&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Libraries", "fromLink": "Syscover/Forms/Libraries.html", "link": "Syscover/Forms/Libraries/Cron.html", "name": "Syscover\\Forms\\Libraries\\Cron", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Libraries\\Cron", "fromLink": "Syscover/Forms/Libraries/Cron.html", "link": "Syscover/Forms/Libraries/Cron.html#method_checkMessageToSend", "name": "Syscover\\Forms\\Libraries\\Cron::checkMessageToSend", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Libraries", "fromLink": "Syscover/Forms/Libraries.html", "link": "Syscover/Forms/Libraries/Miscellaneous.html", "name": "Syscover\\Forms\\Libraries\\Miscellaneous", "doc": "&quot;\n&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Libraries\\Miscellaneous", "fromLink": "Syscover/Forms/Libraries/Miscellaneous.html", "link": "Syscover/Forms/Libraries/Miscellaneous.html#method_checkRecipients", "name": "Syscover\\Forms\\Libraries\\Miscellaneous::checkRecipients", "doc": "&quot;Funtion to check news recipients&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Models", "fromLink": "Syscover/Forms/Models.html", "link": "Syscover/Forms/Models/Comment.html", "name": "Syscover\\Forms\\Models\\Comment", "doc": "&quot;Class Comment&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Comment", "fromLink": "Syscover/Forms/Models/Comment.html", "link": "Syscover/Forms/Models/Comment.html#method_validate", "name": "Syscover\\Forms\\Models\\Comment::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Comment", "fromLink": "Syscover/Forms/Models/Comment.html", "link": "Syscover/Forms/Models/Comment.html#method_scopeBuilder", "name": "Syscover\\Forms\\Models\\Comment::scopeBuilder", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Comment", "fromLink": "Syscover/Forms/Models/Comment.html", "link": "Syscover/Forms/Models/Comment.html#method_addToGetIndexRecords", "name": "Syscover\\Forms\\Models\\Comment::addToGetIndexRecords", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Comment", "fromLink": "Syscover/Forms/Models/Comment.html", "link": "Syscover/Forms/Models/Comment.html#method_customCount", "name": "Syscover\\Forms\\Models\\Comment::customCount", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Comment", "fromLink": "Syscover/Forms/Models/Comment.html", "link": "Syscover/Forms/Models/Comment.html#method_getRecord", "name": "Syscover\\Forms\\Models\\Comment::getRecord", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Models", "fromLink": "Syscover/Forms/Models.html", "link": "Syscover/Forms/Models/Form.html", "name": "Syscover\\Forms\\Models\\Form", "doc": "&quot;Class Form&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Form", "fromLink": "Syscover/Forms/Models/Form.html", "link": "Syscover/Forms/Models/Form.html#method_validate", "name": "Syscover\\Forms\\Models\\Form::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Form", "fromLink": "Syscover/Forms/Models/Form.html", "link": "Syscover/Forms/Models/Form.html#method_scopeBuilder", "name": "Syscover\\Forms\\Models\\Form::scopeBuilder", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Form", "fromLink": "Syscover/Forms/Models/Form.html", "link": "Syscover/Forms/Models/Form.html#method_getForwards", "name": "Syscover\\Forms\\Models\\Form::getForwards", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Form", "fromLink": "Syscover/Forms/Models/Form.html", "link": "Syscover/Forms/Models/Form.html#method_addToGetIndexRecords", "name": "Syscover\\Forms\\Models\\Form::addToGetIndexRecords", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Models", "fromLink": "Syscover/Forms/Models.html", "link": "Syscover/Forms/Models/Forward.html", "name": "Syscover\\Forms\\Models\\Forward", "doc": "&quot;Class Forward&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Forward", "fromLink": "Syscover/Forms/Models/Forward.html", "link": "Syscover/Forms/Models/Forward.html#method_validate", "name": "Syscover\\Forms\\Models\\Forward::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Forward", "fromLink": "Syscover/Forms/Models/Forward.html", "link": "Syscover/Forms/Models/Forward.html#method_scopeBuilder", "name": "Syscover\\Forms\\Models\\Forward::scopeBuilder", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Forward", "fromLink": "Syscover/Forms/Models/Forward.html", "link": "Syscover/Forms/Models/Forward.html#method_addToGetIndexRecords", "name": "Syscover\\Forms\\Models\\Forward::addToGetIndexRecords", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Models", "fromLink": "Syscover/Forms/Models.html", "link": "Syscover/Forms/Models/Message.html", "name": "Syscover\\Forms\\Models\\Message", "doc": "&quot;Class Message&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Message", "fromLink": "Syscover/Forms/Models/Message.html", "link": "Syscover/Forms/Models/Message.html#method_validate", "name": "Syscover\\Forms\\Models\\Message::validate", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Models", "fromLink": "Syscover/Forms/Models.html", "link": "Syscover/Forms/Models/Recipient.html", "name": "Syscover\\Forms\\Models\\Recipient", "doc": "&quot;Class Recipient&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Recipient", "fromLink": "Syscover/Forms/Models/Recipient.html", "link": "Syscover/Forms/Models/Recipient.html#method_validate", "name": "Syscover\\Forms\\Models\\Recipient::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Recipient", "fromLink": "Syscover/Forms/Models/Recipient.html", "link": "Syscover/Forms/Models/Recipient.html#method_getRecord", "name": "Syscover\\Forms\\Models\\Recipient::getRecord", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Models", "fromLink": "Syscover/Forms/Models.html", "link": "Syscover/Forms/Models/Record.html", "name": "Syscover\\Forms\\Models\\Record", "doc": "&quot;Class Record&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Record", "fromLink": "Syscover/Forms/Models/Record.html", "link": "Syscover/Forms/Models/Record.html#method_validate", "name": "Syscover\\Forms\\Models\\Record::validate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Record", "fromLink": "Syscover/Forms/Models/Record.html", "link": "Syscover/Forms/Models/Record.html#method_scopeBuilder", "name": "Syscover\\Forms\\Models\\Record::scopeBuilder", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Record", "fromLink": "Syscover/Forms/Models/Record.html", "link": "Syscover/Forms/Models/Record.html#method_getForm", "name": "Syscover\\Forms\\Models\\Record::getForm", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Record", "fromLink": "Syscover/Forms/Models/Record.html", "link": "Syscover/Forms/Models/Record.html#method_getState", "name": "Syscover\\Forms\\Models\\Record::getState", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Record", "fromLink": "Syscover/Forms/Models/Record.html", "link": "Syscover/Forms/Models/Record.html#method_getComments", "name": "Syscover\\Forms\\Models\\Record::getComments", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Record", "fromLink": "Syscover/Forms/Models/Record.html", "link": "Syscover/Forms/Models/Record.html#method_getRecipients", "name": "Syscover\\Forms\\Models\\Record::getRecipients", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Record", "fromLink": "Syscover/Forms/Models/Record.html", "link": "Syscover/Forms/Models/Record.html#method_addToGetIndexRecords", "name": "Syscover\\Forms\\Models\\Record::addToGetIndexRecords", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "Syscover\\Forms\\Models\\Record", "fromLink": "Syscover/Forms/Models/Record.html", "link": "Syscover/Forms/Models/Record.html#method_customCount", "name": "Syscover\\Forms\\Models\\Record::customCount", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "Syscover\\Forms\\Models", "fromLink": "Syscover/Forms/Models.html", "link": "Syscover/Forms/Models/State.html", "name": "Syscover\\Forms\\Models\\State", "doc": "&quot;Class State&quot;"},
                                                        {"type": "Method", "fromName": "Syscover\\Forms\\Models\\State", "fromLink": "Syscover/Forms/Models/State.html", "link": "Syscover/Forms/Models/State.html#method_validate", "name": "Syscover\\Forms\\Models\\State::validate", "doc": "&quot;\n&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


