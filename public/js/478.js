"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[478],{9018:(e,t,r)=>{r.d(t,{Z:()=>l});var o=r(821),a=["type"];const l={__name:"Button",props:{type:{type:String,default:"submit"}},setup:function(e){return function(t,r){return(0,o.openBlock)(),(0,o.createElementBlock)("button",{type:e.type,class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"},[(0,o.renderSlot)(t.$slots,"default")],8,a)}}}},7887:(e,t,r)=>{r.d(t,{Z:()=>l});var o=r(821),a=["value"];const l={__name:"Input",props:["modelValue"],emits:["update:modelValue"],setup:function(e){var t=(0,o.ref)(null);return(0,o.onMounted)((function(){t.value.hasAttribute("autofocus")&&t.value.focus()})),function(r,l){return(0,o.openBlock)(),(0,o.createElementBlock)("input",{class:"dark:bg-zinc-900 dark:text-white/90 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",value:e.modelValue,onInput:l[0]||(l[0]=function(e){return r.$emit("update:modelValue",e.target.value)}),ref_key:"input",ref:t},null,40,a)}}}},1329:(e,t,r)=>{r.d(t,{Z:()=>c});var o=r(821),a={class:"block font-medium text-sm text-gray-700 dark:text-white/70"},l={key:0},n={key:1};const c={__name:"Label",props:["value"],setup:function(e){return function(t,r){return(0,o.openBlock)(),(0,o.createElementBlock)("label",a,[e.value?((0,o.openBlock)(),(0,o.createElementBlock)("span",l,(0,o.toDisplayString)(e.value),1)):((0,o.openBlock)(),(0,o.createElementBlock)("span",n,[(0,o.renderSlot)(t.$slots,"default")]))])}}}},478:(e,t,r)=>{r.r(t),r.d(t,{default:()=>z});var o=r(821),a={class:"bg-white dark:bg-zinc-900 shadow"},l={class:"max-w-screen-2xl mx-auto py-6 px-6 lg:px-8"},n={class:"flex justify-between"},c={class:"font-semibold text-xl text-gray-800 dark:text-white/90 my-auto"},i={class:"py-12"},d={class:"max-w-screen-2xl mx-auto px-6 lg:px-8"},s={class:"bg-white dark:bg-zinc-900 overflow-hidden shadow-sm rounded-lg"},u={class:"p-6 bg-white dark:bg-zinc-900"},m={key:0,class:"text-red-600"},p={class:"mt-5"},f={key:0,class:"text-red-600"},V={class:"mt-5"},k={key:0,class:"text-red-600"},y={class:"mt-5"},g={key:0,class:"text-red-600"},v={class:"mt-5"},b={key:0,class:"text-red-600"},x=(0,o.createTextVNode)("Loan");var N=r(9018),w=r(1329),B=r(7887),E=r(9038);const h={components:{Head:E.Fb,BreezeButton:N.Z,BreezeLabel:w.Z,BreezeInput:B.Z},setup:function(e){return{form:(0,E.cI)({client_id:e.client.id,principal:"",rate:"",term:"",amortization:"",maturity:""})}},props:{client:Object,errors:Object}};const z=(0,r(3744).Z)(h,[["render",function(e,t,r,N,w,B){var E=(0,o.resolveComponent)("Head"),h=(0,o.resolveComponent)("BreezeLabel"),z=(0,o.resolveComponent)("BreezeInput"),C=(0,o.resolveComponent)("BreezeButton");return(0,o.openBlock)(),(0,o.createElementBlock)(o.Fragment,null,[(0,o.createVNode)(E,null,{default:(0,o.withCtx)((function(){return[(0,o.createElementVNode)("title",null,"\n            Loan - "+(0,o.toDisplayString)(r.client.name)+"\n        ",1)]})),_:1}),(0,o.createElementVNode)("div",a,[(0,o.createElementVNode)("div",l,[(0,o.createElementVNode)("div",n,[(0,o.createElementVNode)("h2",c," Loan for "+(0,o.toDisplayString)(r.client.name),1)])])]),(0,o.createElementVNode)("div",i,[(0,o.createElementVNode)("div",d,[(0,o.createElementVNode)("div",s,[(0,o.createElementVNode)("div",u,[(0,o.createElementVNode)("form",{onSubmit:t[5]||(t[5]=(0,o.withModifiers)((function(t){return N.form.post(e.route("loans.store"))}),["prevent"]))},[(0,o.createElementVNode)("div",null,[(0,o.createVNode)(h,{for:"principal",value:"Principal"}),(0,o.createVNode)(z,{autofocus:"",id:"principal",type:"text",class:"mt-1 block w-full lg:w-96",modelValue:N.form.principal,"onUpdate:modelValue":t[0]||(t[0]=function(e){return N.form.principal=e})},null,8,["modelValue"]),r.errors.principal?((0,o.openBlock)(),(0,o.createElementBlock)("div",m,(0,o.toDisplayString)(r.errors.principal),1)):(0,o.createCommentVNode)("",!0)]),(0,o.createElementVNode)("div",p,[(0,o.createVNode)(h,{for:"rate",value:"Rate (%)"}),(0,o.createVNode)(z,{id:"rate",type:"text",class:"mt-1 block w-full lg:w-96",modelValue:N.form.rate,"onUpdate:modelValue":t[1]||(t[1]=function(e){return N.form.rate=e})},null,8,["modelValue"]),r.errors.rate?((0,o.openBlock)(),(0,o.createElementBlock)("div",f,(0,o.toDisplayString)(r.errors.rate),1)):(0,o.createCommentVNode)("",!0)]),(0,o.createElementVNode)("div",V,[(0,o.createVNode)(h,{for:"term",value:"Term (months)"}),(0,o.createVNode)(z,{id:"term",type:"text",class:"mt-1 block w-full lg:w-96",modelValue:N.form.term,"onUpdate:modelValue":t[2]||(t[2]=function(e){return N.form.term=e})},null,8,["modelValue"]),r.errors.term?((0,o.openBlock)(),(0,o.createElementBlock)("div",k,(0,o.toDisplayString)(r.errors.term),1)):(0,o.createCommentVNode)("",!0)]),(0,o.createElementVNode)("div",y,[(0,o.createVNode)(h,{for:"amortization",value:"Amortization"}),(0,o.createVNode)(z,{id:"amortization",type:"text",class:"mt-1 block w-full lg:w-96",modelValue:N.form.amortization,"onUpdate:modelValue":t[3]||(t[3]=function(e){return N.form.amortization=e})},null,8,["modelValue"]),r.errors.amortization?((0,o.openBlock)(),(0,o.createElementBlock)("div",g,(0,o.toDisplayString)(r.errors.amortization),1)):(0,o.createCommentVNode)("",!0)]),(0,o.createElementVNode)("div",v,[(0,o.createVNode)(h,{for:"maturity",value:"Starting date of payment"}),(0,o.createVNode)(z,{id:"maturity",type:"date",class:"mt-1 block w-full lg:w-96",modelValue:N.form.maturity,"onUpdate:modelValue":t[4]||(t[4]=function(e){return N.form.maturity=e})},null,8,["modelValue"]),r.errors.maturity?((0,o.openBlock)(),(0,o.createElementBlock)("div",b,(0,o.toDisplayString)(r.errors.maturity),1)):(0,o.createCommentVNode)("",!0)]),(0,o.createElementVNode)("div",null,[(0,o.createVNode)(C,{class:(0,o.normalizeClass)(["mt-4",{"opacity-25":N.form.processing}]),disabled:N.form.processing},{default:(0,o.withCtx)((function(){return[x]})),_:1},8,["class","disabled"])])],32)])])])])],64)}]])}}]);