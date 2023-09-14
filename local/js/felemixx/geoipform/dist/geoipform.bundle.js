/* eslint-disable */
this.BX = this.BX || {};
(function (exports) {
    'use strict';

    var Geoipform = /*#__PURE__*/function () {
      function Geoipform() {
        babelHelpers.classCallCheck(this, Geoipform);
        this.form = BX('geoip-form');
        this.input = BX('geoip-form-input');
        this.ipRegexp = new RegExp('^((25[0-5]|(2[0-4]|1\\d|[1-9]|)\\d)\\.?\\b){4}$');
        this.warnMessage = this.form.querySelector('div.warn-message');
        this.initHandlers();
      }
      babelHelpers.createClass(Geoipform, [{
        key: "initHandlers",
        value: function initHandlers() {
          BX.bind(this.form, 'submit', BX.proxy(this.processFormSubmit, this));
        }
      }, {
        key: "processFormSubmit",
        value: function processFormSubmit(event) {
          event.preventDefault();
          var inputValue = this.input.value;
          if (!this.ipRegexp.test(inputValue)) {
            BX.addClass(this.warnMessage, 'd-none');
          } else {
            BX.removeClass(this.warnMessage, 'd-none');
            this.sendRequest(inputValue);
          }
        }
      }, {
        key: "sendRequest",
        value: function sendRequest(userIp) {
          var _this = this;
          BX.ajax.runComponentAction('felemixx.common:geoip.form', 'processFormData', {
            mode: 'class',
            data: {
              userIp: userIp
            }
          }).then(function (res) {
            if (res.data.success) {
              _this.onSuccess(res.data.html);
            } else {
              _this.onFail();
            }
          })["catch"](console.error);
        }
      }, {
        key: "onSuccess",
        value: function onSuccess(data) {
          console.log(data);
        }
      }, {
        key: "onFail",
        value: function onFail() {
          BX.removeClass(this.warnMessage, 'd-none');
        }
      }]);
      return Geoipform;
    }();

    exports.Geoipform = Geoipform;

}((this.BX.Felemixx = this.BX.Felemixx || {})));
//# sourceMappingURL=geoipform.bundle.js.map
