RobotsBuilder.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'robotsbuilder-panel-home',
            renderTo: 'robotsbuilder-panel-home-div'
        }]
    });
    RobotsBuilder.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(RobotsBuilder.page.Home, MODx.Component);
Ext.reg('robotsbuilder-page-home', RobotsBuilder.page.Home);