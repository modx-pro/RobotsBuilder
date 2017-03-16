var RobotsBuilder = function (config) {
    config = config || {};
    RobotsBuilder.superclass.constructor.call(this, config);
};
Ext.extend(RobotsBuilder, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('robotsbuilder', RobotsBuilder);

RobotsBuilder = new RobotsBuilder();