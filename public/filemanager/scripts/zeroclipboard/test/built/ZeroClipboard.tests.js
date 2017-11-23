/*global ZeroClipboard */

(function(module, test) {
  "use strict";

  var originalConfig, originalFlashDetect;

  // Helper functions
  var TestUtils = {
    getHtmlBridge: function() {
      return document.getElementById(ZeroClipboard.config("containerId"));
    }
  };


  module("ZeroClipboard.js (built) unit tests - Core", {
    setup: function() {
      // Store
      originalConfig = ZeroClipboard.config();
      originalFlashDetect = ZeroClipboard.isFlashUnusable;
      // Modify
      ZeroClipboard.isFlashUnusable = function() {
        return false;
      };
      ZeroClipboard.config({ swfPath: originalConfig.swfPath.replace(/\/(?:src|test)\/.*$/i, "/dist/ZeroClipboard.swf") });
    },
    teardown: function() {
      // Restore
      ZeroClipboard.destroy();
      ZeroClipboard.config(originalConfig);
      ZeroClipboard.isFlashUnusable = originalFlashDetect;
    }
  });


  test("`swfPath` finds the expected default URL", function(assert) {
    assert.expect(1);

    // Assert, act, assert
    var rootOrigin = window.location.protocol + "//" + window.location.host + "/";
    var indexOfTest = window.location.pathname.toLowerCase().indexOf("/test/");
    var rootDir = window.location.pathname.slice(1, indexOfTest + 1);
    var rootPath = rootOrigin + rootDir;
    //var zcJsUrl = rootPath + "dist/ZeroClipboard.js";
    var swfPathBasedOnZeroClipboardJsPath = rootPath + "dist/Ze