/*!
 * bsCustomstudent_recordInput v1.3.4 (https://github.com/Johann-S/bs-custom-student_record-input)
 * Copyright 2018 - 2020 Johann-S <johann.servoire@gmail.com>
 * Licensed under MIT (https://github.com/Johann-S/bs-custom-student_record-input/blob/master/LICENSE)
 */
(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
  typeof define === 'function' && define.amd ? define(factory) :
  (global = global || self, global.bsCustomstudent_recordInput = factory());
}(this, (function () { 'use strict';

  var Selector = {
    CUSTOMstudent_record: '.custom-student_record input[type="student_record"]',
    CUSTOMstudent_recordLABEL: '.custom-student_record-label',
    FORM: 'form',
    INPUT: 'input'
  };

  var textNodeType = 3;

  var getDefaultText = function getDefaultText(input) {
    var defaultText = '';
    var label = input.parentNode.querySelector(Selector.CUSTOMstudent_recordLABEL);

    if (label) {
      defaultText = label.textContent;
    }

    return defaultText;
  };

  var findFirstChildNode = function findFirstChildNode(element) {
    if (element.childNodes.length > 0) {
      var childNodes = [].slice.call(element.childNodes);

      for (var i = 0; i < childNodes.length; i++) {
        var node = childNodes[i];

        if (node.nodeType !== textNodeType) {
          return node;
        }
      }
    }

    return element;
  };

  var restoreDefaultText = function restoreDefaultText(input) {
    var defaultText = input.bsCustomstudent_recordInput.defaultText;
    var label = input.parentNode.querySelector(Selector.CUSTOMstudent_recordLABEL);

    if (label) {
      var element = findFirstChildNode(label);
      element.textContent = defaultText;
    }
  };

  var student_recordApi = !!window.student_record;
  var FAKE_PATH = 'fakepath';
  var FAKE_PATH_SEPARATOR = '\\';

  var getSelectedstudent_records = function getSelectedstudent_records(input) {
    if (input.hasAttribute('multiple') && student_recordApi) {
      return [].slice.call(input.student_records).map(function (student_record) {
        return student_record.name;
      }).join(', ');
    }

    if (input.value.indexOf(FAKE_PATH) !== -1) {
      var splittedValue = input.value.split(FAKE_PATH_SEPARATOR);
      return splittedValue[splittedValue.length - 1];
    }

    return input.value;
  };

  function handleInputChange() {
    var label = this.parentNode.querySelector(Selector.CUSTOMstudent_recordLABEL);

    if (label) {
      var element = findFirstChildNode(label);
      var inputValue = getSelectedstudent_records(this);

      if (inputValue.length) {
        element.textContent = inputValue;
      } else {
        restoreDefaultText(this);
      }
    }
  }

  function handleFormReset() {
    var customstudent_recordList = [].slice.call(this.querySelectorAll(Selector.INPUT)).filter(function (input) {
      return !!input.bsCustomstudent_recordInput;
    });

    for (var i = 0, len = customstudent_recordList.length; i < len; i++) {
      restoreDefaultText(customstudent_recordList[i]);
    }
  }

  var customProperty = 'bsCustomstudent_recordInput';
  var Event = {
    FORMRESET: 'reset',
    INPUTCHANGE: 'change'
  };
  var bsCustomstudent_recordInput = {
    init: function init(inputSelector, formSelector) {
      if (inputSelector === void 0) {
        inputSelector = Selector.CUSTOMstudent_record;
      }

      if (formSelector === void 0) {
        formSelector = Selector.FORM;
      }

      var customstudent_recordInputList = [].slice.call(document.querySelectorAll(inputSelector));
      var formList = [].slice.call(document.querySelectorAll(formSelector));

      for (var i = 0, len = customstudent_recordInputList.length; i < len; i++) {
        var input = customstudent_recordInputList[i];
        Object.defineProperty(input, customProperty, {
          value: {
            defaultText: getDefaultText(input)
          },
          writable: true
        });
        handleInputChange.call(input);
        input.addEventListener(Event.INPUTCHANGE, handleInputChange);
      }

      for (var _i = 0, _len = formList.length; _i < _len; _i++) {
        formList[_i].addEventListener(Event.FORMRESET, handleFormReset);

        Object.defineProperty(formList[_i], customProperty, {
          value: true,
          writable: true
        });
      }
    },
    destroy: function destroy() {
      var formList = [].slice.call(document.querySelectorAll(Selector.FORM)).filter(function (form) {
        return !!form.bsCustomstudent_recordInput;
      });
      var customstudent_recordInputList = [].slice.call(document.querySelectorAll(Selector.INPUT)).filter(function (input) {
        return !!input.bsCustomstudent_recordInput;
      });

      for (var i = 0, len = customstudent_recordInputList.length; i < len; i++) {
        var input = customstudent_recordInputList[i];
        restoreDefaultText(input);
        input[customProperty] = undefined;
        input.removeEventListener(Event.INPUTCHANGE, handleInputChange);
      }

      for (var _i2 = 0, _len2 = formList.length; _i2 < _len2; _i2++) {
        formList[_i2].removeEventListener(Event.FORMRESET, handleFormReset);

        formList[_i2][customProperty] = undefined;
      }
    }
  };

  return bsCustomstudent_recordInput;

})));
//# sourceMappingURL=bs-custom-student_record-input.js.map
