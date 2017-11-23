package {

  import flash.display.Stage;
  import flash.display.StageAlign;
  import flash.display.StageScaleMode;
  import flash.display.StageQuality;
  import flash.display.Sprite;
  import flash.events.Event;
  import flash.events.MouseEvent;
  import flash.system.Security;


  /**
   * The ZeroClipboard class creates a simple Sprite button that will put
   * text in the user's clipboard when clicked.
   */
  [SWF(widthPercent="100%", heightPercent="100%", backgroundColor="#FFFFFF")]
  public class ZeroClipboard extends Sprite {

    /**
     * Function through which JavaScript events are emitted. Accounts for scenarios
     * in which ZeroClipboard is used via AMD/CommonJS module loaders, too.
     */
    private var jsEmitter:String = null;

    /**
     * JavaScript proxy object.
     */
    private var jsProxy:JsProxy = null;

    /**
     * Clipboard proxy object.
     */
    private var clipboard:ClipboardInjector = null;


    /**
     * @constructor
     */
    public function ZeroClipboard() {
      // The JIT Compiler does not compile constructors, so ANY
      // cyclomatic complexity higher than 1 is discouraged.
      this.ctor();
    }


    /**
     * The real constructor.
     *
     * @return `undefined`
     */
    private function ctor(): void {
      // If the `stage` is available, begin!
      if (stage) {
        this.init();
      }
      else {
        // Otherwi