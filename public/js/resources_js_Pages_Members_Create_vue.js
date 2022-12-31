"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Members_Create_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Button.vue?vue&type=script&setup=true&lang=js":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Button.vue?vue&type=script&setup=true&lang=js ***!
  \***********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  __name: 'Button',
  props: {
    type: {
      type: String,
      "default": 'submit'
    }
  },
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var __returned__ = {};
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Input.vue?vue&type=script&setup=true&lang=js":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Input.vue?vue&type=script&setup=true&lang=js ***!
  \**********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  __name: 'Input',
  props: ['modelValue'],
  emits: ['update:modelValue'],
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var input = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)(null);
    (0,vue__WEBPACK_IMPORTED_MODULE_0__.onMounted)(function () {
      if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
      }
    });
    var __returned__ = {
      input: input,
      onMounted: vue__WEBPACK_IMPORTED_MODULE_0__.onMounted,
      ref: vue__WEBPACK_IMPORTED_MODULE_0__.ref
    };
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Label.vue?vue&type=script&setup=true&lang=js":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Label.vue?vue&type=script&setup=true&lang=js ***!
  \**********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  __name: 'Label',
  props: ['value'],
  setup: function setup(__props, _ref) {
    var expose = _ref.expose;
    expose();
    var __returned__ = {};
    Object.defineProperty(__returned__, '__isScriptSetup', {
      enumerable: false,
      value: true
    });
    return __returned__;
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Members/Create.vue?vue&type=script&lang=js":
/*!***************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Members/Create.vue?vue&type=script&lang=js ***!
  \***************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Components_Button_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/Components/Button.vue */ "./resources/js/Components/Button.vue");
/* harmony import */ var _Components_Label_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/Components/Label.vue */ "./resources/js/Components/Label.vue");
/* harmony import */ var _Components_Input_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @/Components/Input.vue */ "./resources/js/Components/Input.vue");
/* harmony import */ var _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @inertiajs/inertia-vue3 */ "./node_modules/@inertiajs/inertia-vue3/dist/index.js");




/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    Head: _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_3__.Head,
    BreezeButton: _Components_Button_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    BreezeLabel: _Components_Label_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    BreezeInput: _Components_Input_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    useForm: _inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_3__.useForm
  },
  setup: function setup() {
    var form = (0,_inertiajs_inertia_vue3__WEBPACK_IMPORTED_MODULE_3__.useForm)({
      name: '',
      address: '',
      prov_address: '',
      contact_number: '',
      email: '',
      facebook: '',
      birthdate: '',
      birthplace: '',
      religion: '',
      sss: '',
      tin: '',
      education: '',
      skills: '',
      employment: '',
      income: '',
      beneficiaries: []
    });
    return {
      form: form
    };
  },
  props: {
    errors: Object
  },
  methods: {
    addBeneficiary: function addBeneficiary() {
      this.form.beneficiaries.push({
        relation: '',
        name: '',
        birthday: '',
        phone: ''
      });
    },
    removeBeneficiary: function removeBeneficiary(index) {
      this.form.beneficiaries.splice(index, 1);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Button.vue?vue&type=template&id=067f8786":
/*!****************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Button.vue?vue&type=template&id=067f8786 ***!
  \****************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = ["type"];
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("button", {
    type: $props.type,
    "class": "inline-flex items-center px-4 py-2 bg-theme-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-theme-700 active:bg-theme-900 focus:outline-none focus:border-theme-900 focus:shadow-outline-gray transition ease-in-out duration-150"
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.renderSlot)(_ctx.$slots, "default")], 8
  /* PROPS */
  , _hoisted_1);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Input.vue?vue&type=template&id=43da0f8f":
/*!***************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Input.vue?vue&type=template&id=43da0f8f ***!
  \***************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = ["value"];
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("input", {
    "class": "dark:bg-zinc-900 dark:text-white/90 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",
    value: $props.modelValue,
    onInput: _cache[0] || (_cache[0] = function ($event) {
      return _ctx.$emit('update:modelValue', $event.target.value);
    }),
    ref: "input"
  }, null, 40
  /* PROPS, HYDRATE_EVENTS */
  , _hoisted_1);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Label.vue?vue&type=template&id=8c3adc8e":
/*!***************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Label.vue?vue&type=template&id=8c3adc8e ***!
  \***************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "block font-medium text-sm text-gray-700 dark:text-white/70"
};
var _hoisted_2 = {
  key: 0
};
var _hoisted_3 = {
  key: 1
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("label", _hoisted_1, [$props.value ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_2, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.value), 1
  /* TEXT */
  )) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.renderSlot)(_ctx.$slots, "default")]))]);
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Members/Create.vue?vue&type=template&id=d95e388a":
/*!*******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Members/Create.vue?vue&type=template&id=d95e388a ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


var _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "bg-white dark:bg-zinc-900 shadow"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "max-w-screen-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h2", {
  "class": "font-semibold text-xl text-theme-800 dark:text-white/90 my-auto"
}, " New Member ")])], -1
/* HOISTED */
);

var _hoisted_2 = {
  "class": "py-12"
};
var _hoisted_3 = {
  "class": "max-w-screen-2xl mx-auto sm:px-6 lg:px-8"
};
var _hoisted_4 = {
  "class": "bg-white dark:bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg"
};
var _hoisted_5 = {
  "class": "p-6 bg-white dark:bg-zinc-900"
};

var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "font-bold"
}, "Personal Information", -1
/* HOISTED */
);

var _hoisted_7 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_8 = {
  "class": "mt-5"
};
var _hoisted_9 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_10 = {
  "class": "mt-5"
};
var _hoisted_11 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_12 = {
  "class": "lg:flex"
};
var _hoisted_13 = {
  "class": "mt-5 lg:w-1/4"
};
var _hoisted_14 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_15 = {
  "class": "mt-5 lg:ml-1 lg:w-1/4"
};
var _hoisted_16 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_17 = {
  "class": "mt-4"
};

var _hoisted_18 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "font-bold"
}, "Contact information", -1
/* HOISTED */
);

var _hoisted_19 = {
  "class": ""
};
var _hoisted_20 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_21 = {
  "class": "mt-5"
};
var _hoisted_22 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_23 = {
  "class": "mt-5"
};
var _hoisted_24 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_25 = {
  "class": "mt-4"
};

var _hoisted_26 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "font-bold"
}, "Others", -1
/* HOISTED */
);

var _hoisted_27 = {
  "class": ""
};
var _hoisted_28 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_29 = {
  "class": "mt-5"
};
var _hoisted_30 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_31 = {
  "class": "mt-5"
};
var _hoisted_32 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_33 = {
  "class": "mt-5"
};
var _hoisted_34 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_35 = {
  "class": "mt-5"
};
var _hoisted_36 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_37 = {
  "class": "mt-5"
};
var _hoisted_38 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_39 = {
  "class": "mt-5"
};
var _hoisted_40 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_41 = {
  "class": "mt-4"
};
var _hoisted_42 = {
  "class": "flex items-center space-x-3"
};

var _hoisted_43 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "font-bold"
}, "Beneficiaries", -1
/* HOISTED */
);

var _hoisted_44 = {
  "class": "flex items-center"
};
var _hoisted_45 = ["onClick"];
var _hoisted_46 = {
  "class": "font-semibold text-sm"
};
var _hoisted_47 = {
  "class": "lg:flex"
};
var _hoisted_48 = {
  "class": "mt-2 lg:w-1/4"
};
var _hoisted_49 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_50 = {
  "class": "mt-2 lg:ml-1 lg:w-1/4"
};
var _hoisted_51 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_52 = {
  "class": "lg:flex"
};
var _hoisted_53 = {
  "class": "mt-2 lg:w-1/4"
};
var _hoisted_54 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_55 = {
  "class": "mt-2 lg:ml-1 lg:w-1/4"
};
var _hoisted_56 = {
  key: 0,
  "class": "text-red-600"
};
var _hoisted_57 = {
  "class": "flex lg:w-1/2 w-full"
};

var _hoisted_58 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Save ");

function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _component_Head = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Head");

  var _component_BreezeLabel = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("BreezeLabel");

  var _component_BreezeInput = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("BreezeInput");

  var _component_BreezeButton = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("BreezeButton");

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Head, {
    title: "New Member"
  }), _hoisted_1, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("form", {
    onSubmit: _cache[16] || (_cache[16] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function ($event) {
      return $setup.form.post(_ctx.route('members.store'));
    }, ["prevent"]))
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [_hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "name",
    value: "Name"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "name",
    type: "text",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.name,
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $setup.form.name = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.name ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_7, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.name), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_8, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "address",
    value: "Address"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "address",
    type: "text",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.address,
    "onUpdate:modelValue": _cache[1] || (_cache[1] = function ($event) {
      return $setup.form.address = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.address ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_9, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.address), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_10, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "prov_address",
    value: "Provincial Address"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "prov_address",
    type: "text",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.prov_address,
    "onUpdate:modelValue": _cache[2] || (_cache[2] = function ($event) {
      return $setup.form.prov_address = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.prov_address ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_11, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.prov_address), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_12, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_13, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "birthdate",
    value: "Birthdate"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "birthdate",
    type: "date",
    "class": "mt-1 block w-full",
    modelValue: $setup.form.birthdate,
    "onUpdate:modelValue": _cache[3] || (_cache[3] = function ($event) {
      return $setup.form.birthdate = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.birthdate ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_14, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.birthdate), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_15, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "birthplace",
    value: "Birthplace"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "birthplace",
    type: "text",
    "class": "mt-1 block w-full",
    modelValue: $setup.form.birthplace,
    "onUpdate:modelValue": _cache[4] || (_cache[4] = function ($event) {
      return $setup.form.birthplace = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.birthplace ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_16, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.birthplace), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_17, [_hoisted_18, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_19, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "contact_number",
    value: "Contact Number"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "contact_number",
    type: "text",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.contact_number,
    "onUpdate:modelValue": _cache[5] || (_cache[5] = function ($event) {
      return $setup.form.contact_number = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.contact_number ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_20, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.contact_number), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_21, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "email",
    value: "Email address"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "email",
    type: "text",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.email,
    "onUpdate:modelValue": _cache[6] || (_cache[6] = function ($event) {
      return $setup.form.email = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.email ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_22, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.email), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_23, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "facebook",
    value: "Facebook Name"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "facebook",
    type: "text",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.facebook,
    "onUpdate:modelValue": _cache[7] || (_cache[7] = function ($event) {
      return $setup.form.facebook = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.facebook ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_24, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.facebook), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_25, [_hoisted_26, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_27, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "religion",
    value: "Religion"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "religion",
    type: "text",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.religion,
    "onUpdate:modelValue": _cache[8] || (_cache[8] = function ($event) {
      return $setup.form.religion = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.religion ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_28, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.religion), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_29, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "sss",
    value: "SSS"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "sss",
    type: "text",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.sss,
    "onUpdate:modelValue": _cache[9] || (_cache[9] = function ($event) {
      return $setup.form.sss = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.sss ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_30, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.sss), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_31, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "tin",
    value: "TIN"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "tin",
    type: "text",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.tin,
    "onUpdate:modelValue": _cache[10] || (_cache[10] = function ($event) {
      return $setup.form.tin = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.tin ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_32, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.tin), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_33, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "education",
    value: "Educational attainment/course"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "education",
    type: "text",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.education,
    "onUpdate:modelValue": _cache[11] || (_cache[11] = function ($event) {
      return $setup.form.education = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.education ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_34, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.education), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_35, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "skills",
    value: "Skills"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "skills",
    type: "text",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.skills,
    "onUpdate:modelValue": _cache[12] || (_cache[12] = function ($event) {
      return $setup.form.skills = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.skills ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_36, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.skills), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_37, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "employment",
    value: "Present employment or business activities"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "employment",
    type: "text",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.employment,
    "onUpdate:modelValue": _cache[13] || (_cache[13] = function ($event) {
      return $setup.form.employment = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.employment ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_38, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.employment), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_39, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
    "for": "income",
    value: "Monthly income"
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
    id: "income",
    type: "number",
    "class": "mt-1 block w-full lg:w-1/2",
    modelValue: $setup.form.income,
    "onUpdate:modelValue": _cache[14] || (_cache[14] = function ($event) {
      return $setup.form.income = $event;
    })
  }, null, 8
  /* PROPS */
  , ["modelValue"]), $props.errors.income ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_40, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors.income), 1
  /* TEXT */
  )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_41, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_42, [_hoisted_43, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    onClick: _cache[15] || (_cache[15] = function () {
      return $options.addBeneficiary && $options.addBeneficiary.apply($options, arguments);
    }),
    type: "button",
    "class": "border rounded-lg border-green-500 px-3 py-2 text-green-500 text-xs active:bg-green-500 active:text-white"
  }, "Add")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($setup.form.beneficiaries, function (beneficiary, index) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
      key: index,
      "class": "mb-5"
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_44, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
      onClick: function onClick($event) {
        return $options.removeBeneficiary(index);
      },
      "class": "bx bxs-trash border border-red-500 text-red-500 p-1 rounded-lg mr-2 active:bg-red-500 active:text-white cursor-pointer"
    }, null, 8
    /* PROPS */
    , _hoisted_45), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_46, "Beneficiary " + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(index + 1), 1
    /* TEXT */
    )]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_47, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_48, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
      "for": "".concat(index, ".name"),
      value: "Name"
    }, null, 8
    /* PROPS */
    , ["for"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
      id: "".concat(index, ".name"),
      type: "text",
      "class": "mt-1 block w-full",
      modelValue: beneficiary.name,
      "onUpdate:modelValue": function onUpdateModelValue($event) {
        return beneficiary.name = $event;
      }
    }, null, 8
    /* PROPS */
    , ["id", "modelValue", "onUpdate:modelValue"]), $props.errors["beneficiaries.".concat(index, ".name")] ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_49, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors["beneficiaries.".concat(index, ".name")]), 1
    /* TEXT */
    )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_50, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
      "for": "".concat(index, ".relation"),
      value: "Relation"
    }, null, 8
    /* PROPS */
    , ["for"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
      id: "".concat(index, ".relation"),
      type: "text",
      "class": "mt-1 block w-full",
      modelValue: beneficiary.relation,
      "onUpdate:modelValue": function onUpdateModelValue($event) {
        return beneficiary.relation = $event;
      }
    }, null, 8
    /* PROPS */
    , ["id", "modelValue", "onUpdate:modelValue"]), $props.errors["beneficiaries.".concat(index, ".relation")] ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_51, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors["beneficiaries.".concat(index, ".relation")]), 1
    /* TEXT */
    )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_52, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_53, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
      "for": "".concat(index, ".birthday"),
      value: "Birthday"
    }, null, 8
    /* PROPS */
    , ["for"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
      id: "".concat(index, ".birthday"),
      type: "date",
      "class": "mt-1 block w-full",
      modelValue: beneficiary.birthday,
      "onUpdate:modelValue": function onUpdateModelValue($event) {
        return beneficiary.birthday = $event;
      }
    }, null, 8
    /* PROPS */
    , ["id", "modelValue", "onUpdate:modelValue"]), $props.errors["beneficiaries.".concat(index, ".birthday")] ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_54, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors["beneficiaries.".concat(index, ".birthday")]), 1
    /* TEXT */
    )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_55, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeLabel, {
      "for": "".concat(index, ".phone"),
      value: "Phone number"
    }, null, 8
    /* PROPS */
    , ["for"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeInput, {
      id: "".concat(index, ".phone"),
      type: "text",
      "class": "mt-1 block w-full",
      modelValue: beneficiary.phone,
      "onUpdate:modelValue": function onUpdateModelValue($event) {
        return beneficiary.phone = $event;
      }
    }, null, 8
    /* PROPS */
    , ["id", "modelValue", "onUpdate:modelValue"]), $props.errors["beneficiaries.".concat(index, ".phone")] ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_56, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($props.errors["beneficiaries.".concat(index, ".phone")]), 1
    /* TEXT */
    )) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]);
  }), 128
  /* KEYED_FRAGMENT */
  ))])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_57, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_BreezeButton, {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(["mt-8 justify-center", {
      'opacity-25': $setup.form.processing
    }]),
    disabled: $setup.form.processing
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_58];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["class", "disabled"])])], 32
  /* HYDRATE_EVENTS */
  )])])])])], 64
  /* STABLE_FRAGMENT */
  );
}

/***/ }),

/***/ "./resources/js/Components/Button.vue":
/*!********************************************!*\
  !*** ./resources/js/Components/Button.vue ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Button_vue_vue_type_template_id_067f8786__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Button.vue?vue&type=template&id=067f8786 */ "./resources/js/Components/Button.vue?vue&type=template&id=067f8786");
/* harmony import */ var _Button_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Button.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Components/Button.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var F_Southville_7_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,F_Southville_7_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Button_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Button_vue_vue_type_template_id_067f8786__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Components/Button.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Components/Input.vue":
/*!*******************************************!*\
  !*** ./resources/js/Components/Input.vue ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Input_vue_vue_type_template_id_43da0f8f__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Input.vue?vue&type=template&id=43da0f8f */ "./resources/js/Components/Input.vue?vue&type=template&id=43da0f8f");
/* harmony import */ var _Input_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Input.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Components/Input.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var F_Southville_7_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,F_Southville_7_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Input_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Input_vue_vue_type_template_id_43da0f8f__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Components/Input.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Components/Label.vue":
/*!*******************************************!*\
  !*** ./resources/js/Components/Label.vue ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Label_vue_vue_type_template_id_8c3adc8e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Label.vue?vue&type=template&id=8c3adc8e */ "./resources/js/Components/Label.vue?vue&type=template&id=8c3adc8e");
/* harmony import */ var _Label_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Label.vue?vue&type=script&setup=true&lang=js */ "./resources/js/Components/Label.vue?vue&type=script&setup=true&lang=js");
/* harmony import */ var F_Southville_7_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,F_Southville_7_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Label_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Label_vue_vue_type_template_id_8c3adc8e__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Components/Label.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Members/Create.vue":
/*!***********************************************!*\
  !*** ./resources/js/Pages/Members/Create.vue ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Create_vue_vue_type_template_id_d95e388a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Create.vue?vue&type=template&id=d95e388a */ "./resources/js/Pages/Members/Create.vue?vue&type=template&id=d95e388a");
/* harmony import */ var _Create_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Create.vue?vue&type=script&lang=js */ "./resources/js/Pages/Members/Create.vue?vue&type=script&lang=js");
/* harmony import */ var F_Southville_7_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,F_Southville_7_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Create_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Create_vue_vue_type_template_id_d95e388a__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Members/Create.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Components/Button.vue?vue&type=script&setup=true&lang=js":
/*!*******************************************************************************!*\
  !*** ./resources/js/Components/Button.vue?vue&type=script&setup=true&lang=js ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Button_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Button_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Button.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Button.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Components/Input.vue?vue&type=script&setup=true&lang=js":
/*!******************************************************************************!*\
  !*** ./resources/js/Components/Input.vue?vue&type=script&setup=true&lang=js ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Input_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Input_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Input.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Input.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Components/Label.vue?vue&type=script&setup=true&lang=js":
/*!******************************************************************************!*\
  !*** ./resources/js/Components/Label.vue?vue&type=script&setup=true&lang=js ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Label_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Label_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Label.vue?vue&type=script&setup=true&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Label.vue?vue&type=script&setup=true&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/Members/Create.vue?vue&type=script&lang=js":
/*!***********************************************************************!*\
  !*** ./resources/js/Pages/Members/Create.vue?vue&type=script&lang=js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Create_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Create_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Create.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Members/Create.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/Components/Button.vue?vue&type=template&id=067f8786":
/*!**************************************************************************!*\
  !*** ./resources/js/Components/Button.vue?vue&type=template&id=067f8786 ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Button_vue_vue_type_template_id_067f8786__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Button_vue_vue_type_template_id_067f8786__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Button.vue?vue&type=template&id=067f8786 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Button.vue?vue&type=template&id=067f8786");


/***/ }),

/***/ "./resources/js/Components/Input.vue?vue&type=template&id=43da0f8f":
/*!*************************************************************************!*\
  !*** ./resources/js/Components/Input.vue?vue&type=template&id=43da0f8f ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Input_vue_vue_type_template_id_43da0f8f__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Input_vue_vue_type_template_id_43da0f8f__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Input.vue?vue&type=template&id=43da0f8f */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Input.vue?vue&type=template&id=43da0f8f");


/***/ }),

/***/ "./resources/js/Components/Label.vue?vue&type=template&id=8c3adc8e":
/*!*************************************************************************!*\
  !*** ./resources/js/Components/Label.vue?vue&type=template&id=8c3adc8e ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Label_vue_vue_type_template_id_8c3adc8e__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Label_vue_vue_type_template_id_8c3adc8e__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Label.vue?vue&type=template&id=8c3adc8e */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Components/Label.vue?vue&type=template&id=8c3adc8e");


/***/ }),

/***/ "./resources/js/Pages/Members/Create.vue?vue&type=template&id=d95e388a":
/*!*****************************************************************************!*\
  !*** ./resources/js/Pages/Members/Create.vue?vue&type=template&id=d95e388a ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Create_vue_vue_type_template_id_d95e388a__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Create_vue_vue_type_template_id_d95e388a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Create.vue?vue&type=template&id=d95e388a */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Members/Create.vue?vue&type=template&id=d95e388a");


/***/ })

}]);