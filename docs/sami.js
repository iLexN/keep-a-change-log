
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:Ilex" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Ilex.html">Ilex</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Ilex_ChangeLog" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Ilex/ChangeLog.html">ChangeLog</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Ilex_ChangeLog_Formatter" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Ilex/ChangeLog/Formatter.html">Formatter</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Ilex_ChangeLog_Formatter_DefaultFormatter" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Ilex/ChangeLog/Formatter/DefaultFormatter.html">DefaultFormatter</a>                    </div>                </li>                            <li data-name="class:Ilex_ChangeLog_Formatter_FormatterInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Ilex/ChangeLog/Formatter/FormatterInterface.html">FormatterInterface</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Ilex_ChangeLog_Type" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Ilex/ChangeLog/Type.html">Type</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Ilex_ChangeLog_Type_AbstractChangeType" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Ilex/ChangeLog/Type/AbstractChangeType.html">AbstractChangeType</a>                    </div>                </li>                            <li data-name="class:Ilex_ChangeLog_Type_Added" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Ilex/ChangeLog/Type/Added.html">Added</a>                    </div>                </li>                            <li data-name="class:Ilex_ChangeLog_Type_ChangeTypeFactory" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Ilex/ChangeLog/Type/ChangeTypeFactory.html">ChangeTypeFactory</a>                    </div>                </li>                            <li data-name="class:Ilex_ChangeLog_Type_Changed" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Ilex/ChangeLog/Type/Changed.html">Changed</a>                    </div>                </li>                            <li data-name="class:Ilex_ChangeLog_Type_Deprecated" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Ilex/ChangeLog/Type/Deprecated.html">Deprecated</a>                    </div>                </li>                            <li data-name="class:Ilex_ChangeLog_Type_Fixed" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Ilex/ChangeLog/Type/Fixed.html">Fixed</a>                    </div>                </li>                            <li data-name="class:Ilex_ChangeLog_Type_Removed" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Ilex/ChangeLog/Type/Removed.html">Removed</a>                    </div>                </li>                            <li data-name="class:Ilex_ChangeLog_Type_Security" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Ilex/ChangeLog/Type/Security.html">Security</a>                    </div>                </li>                            <li data-name="class:Ilex_ChangeLog_Type_TypeInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Ilex/ChangeLog/Type/TypeInterface.html">TypeInterface</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Ilex_ChangeLog_ChangeLog" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Ilex/ChangeLog/ChangeLog.html">ChangeLog</a>                    </div>                </li>                            <li data-name="class:Ilex_ChangeLog_Release" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Ilex/ChangeLog/Release.html">Release</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Ilex.html", "name": "Ilex", "doc": "Namespace Ilex"},{"type": "Namespace", "link": "Ilex/ChangeLog.html", "name": "Ilex\\ChangeLog", "doc": "Namespace Ilex\\ChangeLog"},{"type": "Namespace", "link": "Ilex/ChangeLog/Formatter.html", "name": "Ilex\\ChangeLog\\Formatter", "doc": "Namespace Ilex\\ChangeLog\\Formatter"},{"type": "Namespace", "link": "Ilex/ChangeLog/Type.html", "name": "Ilex\\ChangeLog\\Type", "doc": "Namespace Ilex\\ChangeLog\\Type"},
            {"type": "Interface", "fromName": "Ilex\\ChangeLog\\Formatter", "fromLink": "Ilex/ChangeLog/Formatter.html", "link": "Ilex/ChangeLog/Formatter/FormatterInterface.html", "name": "Ilex\\ChangeLog\\Formatter\\FormatterInterface", "doc": "&quot;Interface FormatterInterface&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Formatter\\FormatterInterface", "fromLink": "Ilex/ChangeLog/Formatter/FormatterInterface.html", "link": "Ilex/ChangeLog/Formatter/FormatterInterface.html#method_render", "name": "Ilex\\ChangeLog\\Formatter\\FormatterInterface::render", "doc": "&quot;&quot;"},
            
            {"type": "Interface", "fromName": "Ilex\\ChangeLog\\Type", "fromLink": "Ilex/ChangeLog/Type.html", "link": "Ilex/ChangeLog/Type/TypeInterface.html", "name": "Ilex\\ChangeLog\\Type\\TypeInterface", "doc": "&quot;Interface InterfaceType&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\TypeInterface", "fromLink": "Ilex/ChangeLog/Type/TypeInterface.html", "link": "Ilex/ChangeLog/Type/TypeInterface.html#method_add", "name": "Ilex\\ChangeLog\\Type\\TypeInterface::add", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\TypeInterface", "fromLink": "Ilex/ChangeLog/Type/TypeInterface.html", "link": "Ilex/ChangeLog/Type/TypeInterface.html#method_getTitle", "name": "Ilex\\ChangeLog\\Type\\TypeInterface::getTitle", "doc": "&quot;get the title of the change&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\TypeInterface", "fromLink": "Ilex/ChangeLog/Type/TypeInterface.html", "link": "Ilex/ChangeLog/Type/TypeInterface.html#method_getList", "name": "Ilex\\ChangeLog\\Type\\TypeInterface::getList", "doc": "&quot;&quot;"},
            
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog", "fromLink": "Ilex/ChangeLog.html", "link": "Ilex/ChangeLog/ChangeLog.html", "name": "Ilex\\ChangeLog\\ChangeLog", "doc": "&quot;Class ChangeLog&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\ChangeLog", "fromLink": "Ilex/ChangeLog/ChangeLog.html", "link": "Ilex/ChangeLog/ChangeLog.html#method___construct", "name": "Ilex\\ChangeLog\\ChangeLog::__construct", "doc": "&quot;ChangeLog constructor.&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\ChangeLog", "fromLink": "Ilex/ChangeLog/ChangeLog.html", "link": "Ilex/ChangeLog/ChangeLog.html#method_addRelease", "name": "Ilex\\ChangeLog\\ChangeLog::addRelease", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\ChangeLog", "fromLink": "Ilex/ChangeLog/ChangeLog.html", "link": "Ilex/ChangeLog/ChangeLog.html#method_rand", "name": "Ilex\\ChangeLog\\ChangeLog::rand", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog\\Formatter", "fromLink": "Ilex/ChangeLog/Formatter.html", "link": "Ilex/ChangeLog/Formatter/DefaultFormatter.html", "name": "Ilex\\ChangeLog\\Formatter\\DefaultFormatter", "doc": "&quot;Class DefaultFormatter&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Formatter\\DefaultFormatter", "fromLink": "Ilex/ChangeLog/Formatter/DefaultFormatter.html", "link": "Ilex/ChangeLog/Formatter/DefaultFormatter.html#method___construct", "name": "Ilex\\ChangeLog\\Formatter\\DefaultFormatter::__construct", "doc": "&quot;DefaultFormatter constructor.&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Formatter\\DefaultFormatter", "fromLink": "Ilex/ChangeLog/Formatter/DefaultFormatter.html", "link": "Ilex/ChangeLog/Formatter/DefaultFormatter.html#method_render", "name": "Ilex\\ChangeLog\\Formatter\\DefaultFormatter::render", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog\\Formatter", "fromLink": "Ilex/ChangeLog/Formatter.html", "link": "Ilex/ChangeLog/Formatter/FormatterInterface.html", "name": "Ilex\\ChangeLog\\Formatter\\FormatterInterface", "doc": "&quot;Interface FormatterInterface&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Formatter\\FormatterInterface", "fromLink": "Ilex/ChangeLog/Formatter/FormatterInterface.html", "link": "Ilex/ChangeLog/Formatter/FormatterInterface.html#method_render", "name": "Ilex\\ChangeLog\\Formatter\\FormatterInterface::render", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog", "fromLink": "Ilex/ChangeLog.html", "link": "Ilex/ChangeLog/Release.html", "name": "Ilex\\ChangeLog\\Release", "doc": "&quot;Class Release&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Release", "fromLink": "Ilex/ChangeLog/Release.html", "link": "Ilex/ChangeLog/Release.html#method___construct", "name": "Ilex\\ChangeLog\\Release::__construct", "doc": "&quot;Release constructor.&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Release", "fromLink": "Ilex/ChangeLog/Release.html", "link": "Ilex/ChangeLog/Release.html#method_getChangeList", "name": "Ilex\\ChangeLog\\Release::getChangeList", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Release", "fromLink": "Ilex/ChangeLog/Release.html", "link": "Ilex/ChangeLog/Release.html#method_added", "name": "Ilex\\ChangeLog\\Release::added", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Release", "fromLink": "Ilex/ChangeLog/Release.html", "link": "Ilex/ChangeLog/Release.html#method_changed", "name": "Ilex\\ChangeLog\\Release::changed", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Release", "fromLink": "Ilex/ChangeLog/Release.html", "link": "Ilex/ChangeLog/Release.html#method_deprecated", "name": "Ilex\\ChangeLog\\Release::deprecated", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Release", "fromLink": "Ilex/ChangeLog/Release.html", "link": "Ilex/ChangeLog/Release.html#method_removed", "name": "Ilex\\ChangeLog\\Release::removed", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Release", "fromLink": "Ilex/ChangeLog/Release.html", "link": "Ilex/ChangeLog/Release.html#method_fixed", "name": "Ilex\\ChangeLog\\Release::fixed", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Release", "fromLink": "Ilex/ChangeLog/Release.html", "link": "Ilex/ChangeLog/Release.html#method_security", "name": "Ilex\\ChangeLog\\Release::security", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog\\Type", "fromLink": "Ilex/ChangeLog/Type.html", "link": "Ilex/ChangeLog/Type/AbstractChangeType.html", "name": "Ilex\\ChangeLog\\Type\\AbstractChangeType", "doc": "&quot;Class AbstractChangeType&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\AbstractChangeType", "fromLink": "Ilex/ChangeLog/Type/AbstractChangeType.html", "link": "Ilex/ChangeLog/Type/AbstractChangeType.html#method_add", "name": "Ilex\\ChangeLog\\Type\\AbstractChangeType::add", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\AbstractChangeType", "fromLink": "Ilex/ChangeLog/Type/AbstractChangeType.html", "link": "Ilex/ChangeLog/Type/AbstractChangeType.html#method_getTitle", "name": "Ilex\\ChangeLog\\Type\\AbstractChangeType::getTitle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\AbstractChangeType", "fromLink": "Ilex/ChangeLog/Type/AbstractChangeType.html", "link": "Ilex/ChangeLog/Type/AbstractChangeType.html#method_getList", "name": "Ilex\\ChangeLog\\Type\\AbstractChangeType::getList", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog\\Type", "fromLink": "Ilex/ChangeLog/Type.html", "link": "Ilex/ChangeLog/Type/Added.html", "name": "Ilex\\ChangeLog\\Type\\Added", "doc": "&quot;Class Added&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\Added", "fromLink": "Ilex/ChangeLog/Type/Added.html", "link": "Ilex/ChangeLog/Type/Added.html#method_getTitle", "name": "Ilex\\ChangeLog\\Type\\Added::getTitle", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog\\Type", "fromLink": "Ilex/ChangeLog/Type.html", "link": "Ilex/ChangeLog/Type/ChangeTypeFactory.html", "name": "Ilex\\ChangeLog\\Type\\ChangeTypeFactory", "doc": "&quot;Class ChangeTypeFactory&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\ChangeTypeFactory", "fromLink": "Ilex/ChangeLog/Type/ChangeTypeFactory.html", "link": "Ilex/ChangeLog/Type/ChangeTypeFactory.html#method_factory", "name": "Ilex\\ChangeLog\\Type\\ChangeTypeFactory::factory", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog\\Type", "fromLink": "Ilex/ChangeLog/Type.html", "link": "Ilex/ChangeLog/Type/Changed.html", "name": "Ilex\\ChangeLog\\Type\\Changed", "doc": "&quot;Class Changed&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\Changed", "fromLink": "Ilex/ChangeLog/Type/Changed.html", "link": "Ilex/ChangeLog/Type/Changed.html#method_getTitle", "name": "Ilex\\ChangeLog\\Type\\Changed::getTitle", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog\\Type", "fromLink": "Ilex/ChangeLog/Type.html", "link": "Ilex/ChangeLog/Type/Deprecated.html", "name": "Ilex\\ChangeLog\\Type\\Deprecated", "doc": "&quot;Class Deprecated&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\Deprecated", "fromLink": "Ilex/ChangeLog/Type/Deprecated.html", "link": "Ilex/ChangeLog/Type/Deprecated.html#method_getTitle", "name": "Ilex\\ChangeLog\\Type\\Deprecated::getTitle", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog\\Type", "fromLink": "Ilex/ChangeLog/Type.html", "link": "Ilex/ChangeLog/Type/Fixed.html", "name": "Ilex\\ChangeLog\\Type\\Fixed", "doc": "&quot;Class Fixed&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\Fixed", "fromLink": "Ilex/ChangeLog/Type/Fixed.html", "link": "Ilex/ChangeLog/Type/Fixed.html#method_getTitle", "name": "Ilex\\ChangeLog\\Type\\Fixed::getTitle", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog\\Type", "fromLink": "Ilex/ChangeLog/Type.html", "link": "Ilex/ChangeLog/Type/Removed.html", "name": "Ilex\\ChangeLog\\Type\\Removed", "doc": "&quot;Class Removed&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\Removed", "fromLink": "Ilex/ChangeLog/Type/Removed.html", "link": "Ilex/ChangeLog/Type/Removed.html#method_getTitle", "name": "Ilex\\ChangeLog\\Type\\Removed::getTitle", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog\\Type", "fromLink": "Ilex/ChangeLog/Type.html", "link": "Ilex/ChangeLog/Type/Security.html", "name": "Ilex\\ChangeLog\\Type\\Security", "doc": "&quot;Class Security&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\Security", "fromLink": "Ilex/ChangeLog/Type/Security.html", "link": "Ilex/ChangeLog/Type/Security.html#method_getTitle", "name": "Ilex\\ChangeLog\\Type\\Security::getTitle", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Ilex\\ChangeLog\\Type", "fromLink": "Ilex/ChangeLog/Type.html", "link": "Ilex/ChangeLog/Type/TypeInterface.html", "name": "Ilex\\ChangeLog\\Type\\TypeInterface", "doc": "&quot;Interface InterfaceType&quot;"},
                                                        {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\TypeInterface", "fromLink": "Ilex/ChangeLog/Type/TypeInterface.html", "link": "Ilex/ChangeLog/Type/TypeInterface.html#method_add", "name": "Ilex\\ChangeLog\\Type\\TypeInterface::add", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\TypeInterface", "fromLink": "Ilex/ChangeLog/Type/TypeInterface.html", "link": "Ilex/ChangeLog/Type/TypeInterface.html#method_getTitle", "name": "Ilex\\ChangeLog\\Type\\TypeInterface::getTitle", "doc": "&quot;get the title of the change&quot;"},
                    {"type": "Method", "fromName": "Ilex\\ChangeLog\\Type\\TypeInterface", "fromLink": "Ilex/ChangeLog/Type/TypeInterface.html", "link": "Ilex/ChangeLog/Type/TypeInterface.html#method_getList", "name": "Ilex\\ChangeLog\\Type\\TypeInterface::getList", "doc": "&quot;&quot;"},
            
            
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


