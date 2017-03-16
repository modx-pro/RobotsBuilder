RobotsBuilder.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'robotsbuilder-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('robotsbuilder') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('robotsbuilder_items'),
                layout: 'anchor',
                items: [{
                    html: _('robotsbuilder_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'robotsbuilder-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    RobotsBuilder.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(RobotsBuilder.panel.Home, MODx.Panel);
Ext.reg('robotsbuilder-panel-home', RobotsBuilder.panel.Home);
