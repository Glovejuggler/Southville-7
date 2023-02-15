"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[418],{43:(e,t,r)=>{r.d(t,{Z:()=>s});var n=r(821),o={key:0,class:"mt-4 pb-8 text-center"},a=[(0,n.createElementVNode)("i",{class:"bx bx-loader-alt animate-spin text-3xl text-theme-800"},null,-1)];var l=r(3279),i=r.n(l);const c={props:{loadMore:Function},data:function(){return{loading:!1}},mounted:function(){var e=this;window.addEventListener("scroll",i()((function(t){var r;document.documentElement.offsetHeight-document.documentElement.scrollTop-(null!==(r=window.innerHeight)&&void 0!==r?r:screen.height)<200&&!e.loading&&(e.loading=!0,e.loadMore().finally((function(){return e.loading=!1})))}),100))}};const s=(0,r(3744).Z)(c,[["render",function(e,t,r,l,i,c){return(0,n.openBlock)(),(0,n.createElementBlock)(n.Fragment,null,[(0,n.createElementVNode)("div",null,[(0,n.renderSlot)(e.$slots,"default")]),i.loading?((0,n.openBlock)(),(0,n.createElementBlock)("div",o,a)):(0,n.createCommentVNode)("",!0)],64)}]])},7887:(e,t,r)=>{r.d(t,{Z:()=>a});var n=r(821),o=["value"];const a={__name:"Input",props:["modelValue"],emits:["update:modelValue"],setup:function(e){var t=(0,n.ref)(null);return(0,n.onMounted)((function(){t.value.hasAttribute("autofocus")&&t.value.focus()})),function(r,a){return(0,n.openBlock)(),(0,n.createElementBlock)("input",{class:"dark:bg-zinc-900 dark:text-white/90 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",value:e.modelValue,onInput:a[0]||(a[0]=function(e){return r.$emit("update:modelValue",e.target.value)}),ref_key:"input",ref:t},null,40,o)}}}},3418:(e,t,r)=>{r.r(t),r.d(t,{default:()=>F});var n=r(821),o=r(9038),a=r(7887),l=r(3493),i=r.n(l),c=r(5937),s=r.n(c),d=r(9669),u=r.n(d),m=r(43);function f(e){return function(e){if(Array.isArray(e))return p(e)}(e)||function(e){if("undefined"!=typeof Symbol&&null!=e[Symbol.iterator]||null!=e["@@iterator"])return Array.from(e)}(e)||function(e,t){if(!e)return;if("string"==typeof e)return p(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);"Object"===r&&e.constructor&&(r=e.constructor.name);if("Map"===r||"Set"===r)return Array.from(e);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return p(e,t)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function p(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}function b(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function g(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?b(Object(r),!0).forEach((function(t){h(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):b(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}function h(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}var v=(0,n.createElementVNode)("title",null,"\r\n            Members\r\n        ",-1),x={class:"bg-white dark:bg-zinc-900 shadow"},y={class:"max-w-screen-2xl mx-auto py-6 px-6 lg:px-8"},w={class:"flex justify-between items-center"},k=(0,n.createElementVNode)("h2",{class:"font-semibold text-xl text-theme-800 dark:text-white/90"}," Members ",-1),V=(0,n.createTextVNode)(" Add "),E={class:"pt-6"},N={class:"max-w-screen-2xl mx-auto px-6 lg:px-8 lg:flex justify-between"},B={class:"flex items-center lg:flex-row flex-col-reverse lg:space-x-2 space-x-0"},O=["href"],M={class:"flex flex-col lg:flex-row lg:space-y-0 space-y-2 lg:space-x-2 space-x-0 w-full lg:w-auto"},j=[(0,n.createStaticVNode)('<option value="">All</option><option value="active">Active loans</option><option value="inactive">No active loans</option><option value="overdue">Overdue payments</option><option value="dueToday">Payments due today</option>',5)],S=[(0,n.createElementVNode)("option",{value:""},"Oldest first",-1),(0,n.createElementVNode)("option",{value:"dateAddedDesc"},"Newest first",-1),(0,n.createElementVNode)("option",{value:"nameAsc"},"Name, A-Z",-1),(0,n.createElementVNode)("option",{value:"nameDesc"},"Name, Z-A",-1)],_={class:"py-4"},A={key:0,class:"px-2 inline-flex rounded-lg text-xs bg-green-200 text-green-800 dark:bg-transparent dark:border-green-500 dark:border dark:text-green-500"},C={key:1,class:"text-red-800 rounded-full text-xs inline-flex mx-1 px-2 bg-red-200 place-items-center dark:border dark:border-red-500 dark:text-red-500 dark:bg-transparent"},D={key:2,class:"text-xs inline-flex items-center ml-1"},P={props:{filters:Object,members:Object},data:function(){var e,t;return{form:{search:this.filters.search,status:null!==(e=this.filters.status)&&void 0!==e?e:"",sortBy:null!==(t=this.filters.sortBy)&&void 0!==t?t:""},visibleMembers:this.members}},watch:{form:{deep:!0,handler:i()((function(){var e=this;this.$inertia.get("/members",s()(this.form),{preserveState:!0,preserveScroll:!0,replace:!0,onFinish:function(){return e.visibleMembers=e.members}})}),150)}},methods:{loadMoreMembers:function(){var e=this;return this.visibleMembers.next_page_url?u().get(this.visibleMembers.next_page_url).then((function(t){e.visibleMembers=g(g({},t.data),{},{data:[].concat(f(e.visibleMembers.data),f(t.data.data))})})):Promise.resolve()}}};const F=Object.assign(P,{__name:"Index",setup:function(e){return function(t,r){return(0,n.openBlock)(),(0,n.createElementBlock)(n.Fragment,null,[(0,n.createVNode)((0,n.unref)(o.Fb),null,{default:(0,n.withCtx)((function(){return[v]})),_:1}),(0,n.createElementVNode)("div",x,[(0,n.createElementVNode)("div",y,[(0,n.createElementVNode)("div",w,[k,t.$page.props.auth.position.some((function(e){return["Chairman","Vice Chairman","Secretary"].includes(e)}))?((0,n.openBlock)(),(0,n.createBlock)((0,n.unref)(o.rU),{key:0,as:"button",href:t.route("members.create"),class:"inline-flex cursor-pointer items-center px-4 py-2 bg-theme-800 dark:bg-white/90 dark:text-zinc-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-theme-700 active:bg-theme-900 focus:outline-none focus:border-theme-900 focus:shadow-outline-gray transition ease-in-out duration-150 leading-none"},{default:(0,n.withCtx)((function(){return[V]})),_:1},8,["href"])):(0,n.createCommentVNode)("",!0)])])]),(0,n.createElementVNode)("div",E,[(0,n.createElementVNode)("div",N,[(0,n.createVNode)(a.Z,{modelValue:t.form.search,"onUpdate:modelValue":r[0]||(r[0]=function(e){return t.form.search=e}),class:"mt-1 block lg:w-96 w-full",type:"text",placeholder:"Search..."},null,8,["modelValue"]),(0,n.createElementVNode)("div",B,[t.visibleMembers.data.length?((0,n.openBlock)(),(0,n.createElementBlock)("a",{key:0,target:"_blank",type:"button",href:t.route("members.pdf",[e.filters]),class:"h-min px-4 py-2 text-xs rounded-lg bg-theme-600 hover:bg-theme-700 active:bg-theme-900 text-white inline-flex items-center justify-center lg:mt-0 mt-2 w-full"}," Download as PDF",8,O)):(0,n.createCommentVNode)("",!0),(0,n.createElementVNode)("div",M,[(0,n.withDirectives)((0,n.createElementVNode)("select",{id:"status","onUpdate:modelValue":r[1]||(r[1]=function(e){return t.form.status=e}),class:"block rounded-lg dark:bg-zinc-900 text-sm dark:text-white/70 text-gray-700 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-2 lg:mt-0 w-full lg:w-auto"},j,512),[[n.vModelSelect,t.form.status]]),(0,n.withDirectives)((0,n.createElementVNode)("select",{id:"sortBy","onUpdate:modelValue":r[2]||(r[2]=function(e){return t.form.sortBy=e}),class:"block rounded-lg dark:bg-zinc-900 text-sm dark:text-white/70 text-gray-700 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-2 lg:mt-0 w-full lg:w-auto"},S,512),[[n.vModelSelect,t.form.sortBy]])])])])]),(0,n.createVNode)(m.Z,{loadMore:t.loadMoreMembers},{default:(0,n.withCtx)((function(){return[(0,n.createElementVNode)("div",_,[(0,n.createElementVNode)("div",{class:(0,n.normalizeClass)(["max-w-screen-2xl mx-auto px-6 lg:px-8 lg:grid lg:gap-2 flex flex-col",{"grid-cols-2":t.visibleMembers.data.length>1}])},[((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)(t.visibleMembers.data,(function(e){return(0,n.openBlock)(),(0,n.createBlock)((0,n.unref)(o.rU),{href:t.route("members.show",e.id),class:"bg-white rounded-lg border border-transparent hover:border-theme-800 p-3 mb-2 flex justify-between"},{default:(0,n.withCtx)((function(){var t,r;return[(0,n.createElementVNode)("div",null,(0,n.toDisplayString)(e.name),1),(0,n.createElementVNode)("div",null,[e.loan?((0,n.openBlock)(),(0,n.createElementBlock)("span",A," Active")):(0,n.createCommentVNode)("",!0),null!==(t=e.loan)&&void 0!==t&&t.has_late_payment?((0,n.openBlock)(),(0,n.createElementBlock)("span",C,(0,n.toDisplayString)(null===(r=e.loan)||void 0===r?void 0:r.has_late_payment),1)):(0,n.createCommentVNode)("",!0),e.loan?((0,n.openBlock)(),(0,n.createElementBlock)("span",D," Balance: "+(0,n.toDisplayString)(Math.round(e.loan.balance).toLocaleString()),1)):(0,n.createCommentVNode)("",!0)])]})),_:2},1032,["href"])})),256))],2)])]})),_:1},8,["loadMore"])],64)}}})}}]);