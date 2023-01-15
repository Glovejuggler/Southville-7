"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[398],{9018:(e,t,o)=>{o.d(t,{Z:()=>l});var r=o(821),n=["type"];const l={__name:"Button",props:{type:{type:String,default:"submit"}},setup:function(e){return function(t,o){return(0,r.openBlock)(),(0,r.createElementBlock)("button",{type:e.type,class:"inline-flex items-center px-4 py-2 bg-theme-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-theme-700 active:bg-theme-900 focus:outline-none focus:border-theme-900 focus:shadow-outline-gray transition ease-in-out duration-150"},[(0,r.renderSlot)(t.$slots,"default")],8,n)}}}},7887:(e,t,o)=>{o.d(t,{Z:()=>l});var r=o(821),n=["value"];const l={__name:"Input",props:["modelValue"],emits:["update:modelValue"],setup:function(e){var t=(0,r.ref)(null);return(0,r.onMounted)((function(){t.value.hasAttribute("autofocus")&&t.value.focus()})),function(o,l){return(0,r.openBlock)(),(0,r.createElementBlock)("input",{class:"dark:bg-zinc-900 dark:text-white/90 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",value:e.modelValue,onInput:l[0]||(l[0]=function(e){return o.$emit("update:modelValue",e.target.value)}),ref_key:"input",ref:t},null,40,n)}}}},1329:(e,t,o)=>{o.d(t,{Z:()=>c});var r=o(821),n={class:"block font-medium text-sm text-gray-700 dark:text-white/70"},l={key:0},a={key:1};const c={__name:"Label",props:["value"],setup:function(e){return function(t,o){return(0,r.openBlock)(),(0,r.createElementBlock)("label",n,[e.value?((0,r.openBlock)(),(0,r.createElementBlock)("span",l,(0,r.toDisplayString)(e.value),1)):((0,r.openBlock)(),(0,r.createElementBlock)("span",a,[(0,r.renderSlot)(t.$slots,"default")]))])}}}},8398:(e,t,o)=>{o.r(t),o.d(t,{default:()=>h});var r=o(821),n=(0,r.createElementVNode)("title",null,"\r\n            New Loan Service\r\n        ",-1),l=(0,r.createElementVNode)("div",{class:"bg-white dark:bg-zinc-900 shadow"},[(0,r.createElementVNode)("div",{class:"max-w-screen-2xl mx-auto py-6 px-6 lg:px-8"},[(0,r.createElementVNode)("div",{class:"flex justify-between"},[(0,r.createElementVNode)("h2",{class:"font-semibold text-xl text-theme-800 dark:text-white/90 my-auto"}," New Loan Service ")])])],-1),a={class:"py-4"},c={class:"max-w-screen-2xl mx-auto px-6 lg:px-8"},d={class:"bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg"},u={class:"p-6 bg-white dark:bg-zinc-900"},s={key:0,class:"text-red-600"},i={class:"mt-5"},m=[(0,r.createElementVNode)("option",{value:"",disabled:"",hidden:"",selected:""},"Select one",-1),(0,r.createElementVNode)("option",{value:"Cash"},"Cash",-1),(0,r.createElementVNode)("option",{value:"Goods"},"Goods",-1)],p={key:0,class:"text-red-600"},f={class:"mt-5"},v={key:0,class:"text-red-600"},k={class:"mt-5"},V={key:0,class:"text-red-600"},g=(0,r.createTextVNode)("Add");var b=o(9018),y=o(1329),w=o(7887),x=o(9038);const N={components:{Head:x.Fb,BreezeButton:b.Z,BreezeLabel:y.Z,BreezeInput:w.Z},setup:function(){return{form:(0,x.cI)({name:"",type:"",equivalent:"",requirement:""})}},props:{errors:Object}};const h=(0,o(3744).Z)(N,[["render",function(e,t,o,b,y,w){var x=(0,r.resolveComponent)("Head"),N=(0,r.resolveComponent)("BreezeLabel"),h=(0,r.resolveComponent)("BreezeInput"),E=(0,r.resolveComponent)("BreezeButton");return(0,r.openBlock)(),(0,r.createElementBlock)(r.Fragment,null,[(0,r.createVNode)(x,null,{default:(0,r.withCtx)((function(){return[n]})),_:1}),l,(0,r.createElementVNode)("div",a,[(0,r.createElementVNode)("div",c,[(0,r.createElementVNode)("div",d,[(0,r.createElementVNode)("div",u,[(0,r.createElementVNode)("form",{onSubmit:t[4]||(t[4]=(0,r.withModifiers)((function(t){return b.form.post(e.route("loanables.store"))}),["prevent"]))},[(0,r.createElementVNode)("div",null,[(0,r.createVNode)(N,{for:"name",value:"Name"}),(0,r.createVNode)(h,{autofocus:"",id:"name",type:"text",class:"mt-1 block w-full lg:w-96",modelValue:b.form.name,"onUpdate:modelValue":t[0]||(t[0]=function(e){return b.form.name=e})},null,8,["modelValue"]),o.errors.name?((0,r.openBlock)(),(0,r.createElementBlock)("div",s,(0,r.toDisplayString)(o.errors.name),1)):(0,r.createCommentVNode)("",!0)]),(0,r.createElementVNode)("div",i,[(0,r.createVNode)(N,{for:"type",value:"Type"}),(0,r.withDirectives)((0,r.createElementVNode)("select",{"onUpdate:modelValue":t[1]||(t[1]=function(e){return b.form.type=e}),id:"type",class:"block rounded-lg dark:bg-zinc-900 dark:text-white/70 text-gray-700 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-2 lg:mt-0 w-full lg:w-96"},m,512),[[r.vModelSelect,b.form.type]]),o.errors.type?((0,r.openBlock)(),(0,r.createElementBlock)("div",p,(0,r.toDisplayString)(o.errors.type),1)):(0,r.createCommentVNode)("",!0)]),(0,r.createElementVNode)("div",f,[(0,r.createVNode)(N,{for:"equivalent",value:"Equivalent amount"}),(0,r.createVNode)(h,{id:"equivalent",type:"text",class:"mt-1 block w-full lg:w-96",modelValue:b.form.equivalent,"onUpdate:modelValue":t[2]||(t[2]=function(e){return b.form.equivalent=e})},null,8,["modelValue"]),o.errors.equivalent?((0,r.openBlock)(),(0,r.createElementBlock)("div",v,(0,r.toDisplayString)(o.errors.equivalent),1)):(0,r.createCommentVNode)("",!0)]),(0,r.createElementVNode)("div",k,[(0,r.createVNode)(N,{for:"requirement",value:"Required share capital"}),(0,r.createVNode)(h,{id:"requirement",type:"text",class:"mt-1 block w-full lg:w-96",modelValue:b.form.requirement,"onUpdate:modelValue":t[3]||(t[3]=function(e){return b.form.requirement=e})},null,8,["modelValue"]),o.errors.requirement?((0,r.openBlock)(),(0,r.createElementBlock)("div",V,(0,r.toDisplayString)(o.errors.requirement),1)):(0,r.createCommentVNode)("",!0)]),(0,r.createElementVNode)("div",null,[(0,r.createVNode)(E,{class:(0,r.normalizeClass)(["mt-4",{"opacity-25":b.form.processing}]),disabled:b.form.processing},{default:(0,r.withCtx)((function(){return[g]})),_:1},8,["class","disabled"])])],32)])])])])],64)}]])}}]);