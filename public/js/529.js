"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[529],{7887:(e,t,n)=>{n.d(t,{Z:()=>o});var r=n(821),l=["value"];const o={__name:"Input",props:["modelValue"],emits:["update:modelValue"],setup:function(e){var t=(0,r.ref)(null);return(0,r.onMounted)((function(){t.value.hasAttribute("autofocus")&&t.value.focus()})),function(n,o){return(0,r.openBlock)(),(0,r.createElementBlock)("input",{class:"border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",value:e.modelValue,onInput:o[0]||(o[0]=function(e){return n.$emit("update:modelValue",e.target.value)}),ref_key:"input",ref:t},null,40,l)}}}},5802:(e,t,n)=>{n.d(t,{Z:()=>c});var r=n(821),l={key:0,class:"text-xs"},o={class:"flex flex-wrap -mb-1"},a=["innerHTML"];const s={components:{Link:n(9038).rU},props:{links:Array}};const c=(0,n(3744).Z)(s,[["render",function(e,t,n,s,c,d){var u=(0,r.resolveComponent)("Link");return n.links.length>3?((0,r.openBlock)(),(0,r.createElementBlock)("div",l,[(0,r.createElementVNode)("div",o,[((0,r.openBlock)(!0),(0,r.createElementBlock)(r.Fragment,null,(0,r.renderList)(n.links,(function(e,t){return(0,r.openBlock)(),(0,r.createElementBlock)(r.Fragment,{key:t},[null===e.url?((0,r.openBlock)(),(0,r.createElementBlock)("div",{key:0,class:"mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded",innerHTML:e.label},null,8,a)):((0,r.openBlock)(),(0,r.createBlock)(u,{key:1,class:(0,r.normalizeClass)(["mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded focus:border-gray-500",{"bg-gray-700 text-white":e.active}]),href:e.url,innerHTML:e.label},null,8,["class","href","innerHTML"]))],64)})),128))])])):(0,r.createCommentVNode)("",!0)}]])},4529:(e,t,n)=>{n.r(t),n.d(t,{default:()=>T});var r=n(821),l=n(9038),o=n(5802),a=n(7887),s=(n(9680),n(3493)),c=n.n(s),d=n(5937),u=n.n(d),i={class:"bg-white shadow"},m={class:"max-w-screen-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8"},p={class:"flex justify-between"},f=(0,r.createElementVNode)("h2",{class:"font-semibold text-xl text-gray-800 my-auto"}," Lendees ",-1),x=(0,r.createTextVNode)(" Add "),g={class:"pt-6"},h={class:"max-w-screen-2xl mx-auto px-6 lg:px-8 lg:flex justify-between"},v=[(0,r.createStaticVNode)('<option value="" selected>All</option><option value="active">Active loans</option><option value="inactive">No active loans</option><option value="overdue">Overdue payments</option><option value="dueToday">Payments due today</option>',5)],b={class:"py-4"},k={class:"max-w-screen-2xl mx-auto px-6 lg:px-8"},V={class:"bg-white overflow-hidden shadow-sm rounded-lg"},y={class:"p-6 bg-white border-b border-gray-200"},N={class:"table-fixed w-full text-sm whitespace-nowrap"},w=(0,r.createElementVNode)("thead",null,[(0,r.createElementVNode)("tr",{class:"uppercase text-left"},[(0,r.createElementVNode)("th",{class:"px-3"},"Name"),(0,r.createElementVNode)("th",{class:"px-3"},"Address"),(0,r.createElementVNode)("th",{class:"px-3"})])],-1),E={class:"hover:bg-neutral-200 group"},B={class:"rounded-l-lg"},_={class:"rounded-r-lg"},C={key:0,class:"px-2 inline-flex rounded-lg bg-green-200 text-green-800"},L={key:1,class:"text-red-800 rounded-full inline-flex mx-1 px-2 bg-red-200 place-items-center"},S={props:{filters:Object,lendees:Object},data:function(){var e;return{form:{search:this.filters.search,status:null!==(e=this.filters.status)&&void 0!==e?e:""}}},watch:{form:{deep:!0,handler:c()((function(){this.$inertia.get("/lendees",u()(this.form),{preserveState:!0,preserveScroll:!0,replace:!0})}),150)}}};const T=Object.assign(S,{__name:"Index",setup:function(e){return function(t,n){return(0,r.openBlock)(),(0,r.createElementBlock)(r.Fragment,null,[(0,r.createVNode)((0,r.unref)(l.Fb),{title:"Lendees"}),(0,r.createElementVNode)("div",i,[(0,r.createElementVNode)("div",m,[(0,r.createElementVNode)("div",p,[f,(0,r.createVNode)((0,r.unref)(l.rU),{as:"button",href:t.route("lendees.create"),class:"inline-flex cursor-pointer items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"},{default:(0,r.withCtx)((function(){return[x]})),_:1},8,["href"])])])]),(0,r.createElementVNode)("div",g,[(0,r.createElementVNode)("div",h,[(0,r.createVNode)(a.Z,{modelValue:t.form.search,"onUpdate:modelValue":n[0]||(n[0]=function(e){return t.form.search=e}),class:"mt-1 block lg:w-96 w-full",type:"text",placeholder:"Search..."},null,8,["modelValue"]),(0,r.withDirectives)((0,r.createElementVNode)("select",{"onUpdate:modelValue":n[1]||(n[1]=function(e){return t.form.status=e}),class:"block rounded-lg text-sm text-gray-700 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2 lg:mt-0 w-full lg:w-auto"},v,512),[[r.vModelSelect,t.form.status]])])]),(0,r.createElementVNode)("div",b,[(0,r.createElementVNode)("div",k,[(0,r.createElementVNode)("div",V,[(0,r.createElementVNode)("div",y,[(0,r.createElementVNode)("table",N,[w,(0,r.createElementVNode)("tbody",null,[((0,r.openBlock)(!0),(0,r.createElementBlock)(r.Fragment,null,(0,r.renderList)(e.lendees.data,(function(n){return(0,r.openBlock)(),(0,r.createElementBlock)("tr",E,[(0,r.createElementVNode)("td",B,[(0,r.createVNode)((0,r.unref)(l.rU),{class:"flex p-3",href:t.route("lendees.show",n.id)},{default:(0,r.withCtx)((function(){return[(0,r.createTextVNode)((0,r.toDisplayString)(n.name),1)]})),_:2},1032,["href"])]),(0,r.createElementVNode)("td",null,[(0,r.createVNode)((0,r.unref)(l.rU),{class:"flex p-3",href:t.route("lendees.show",n.id)},{default:(0,r.withCtx)((function(){return[(0,r.createTextVNode)((0,r.toDisplayString)(n.address),1)]})),_:2},1032,["href"])]),(0,r.createElementVNode)("td",_,[(0,r.createVNode)((0,r.unref)(l.rU),{class:"flex p-3",href:t.route("lendees.show",n.id)},{default:(0,r.withCtx)((function(){var t,l;return[n.loan?((0,r.openBlock)(),(0,r.createElementBlock)("span",C," Active")):(0,r.createCommentVNode)("",!0),null!==(t=n.loan)&&void 0!==t&&t.has_late_payment&&"overdue"===e.filters.status?((0,r.openBlock)(),(0,r.createElementBlock)("span",L,(0,r.toDisplayString)(null===(l=n.loan)||void 0===l?void 0:l.has_late_payment),1)):(0,r.createCommentVNode)("",!0)]})),_:2},1032,["href"])])])})),256))])]),(0,r.createVNode)(o.Z,{class:"mt-6",links:e.lendees.links},null,8,["links"])])])])])],64)}}})}}]);