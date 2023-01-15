"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[423],{9018:(e,t,o)=>{o.d(t,{Z:()=>l});var a=o(821),r=["type"];const l={__name:"Button",props:{type:{type:String,default:"submit"}},setup:function(e){return function(t,o){return(0,a.openBlock)(),(0,a.createElementBlock)("button",{type:e.type,class:"inline-flex items-center px-4 py-2 bg-theme-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-theme-700 active:bg-theme-900 focus:outline-none focus:border-theme-900 focus:shadow-outline-gray transition ease-in-out duration-150"},[(0,a.renderSlot)(t.$slots,"default")],8,r)}}}},7887:(e,t,o)=>{o.d(t,{Z:()=>l});var a=o(821),r=["value"];const l={__name:"Input",props:["modelValue"],emits:["update:modelValue"],setup:function(e){var t=(0,a.ref)(null);return(0,a.onMounted)((function(){t.value.hasAttribute("autofocus")&&t.value.focus()})),function(o,l){return(0,a.openBlock)(),(0,a.createElementBlock)("input",{class:"dark:bg-zinc-900 dark:text-white/90 border-gray-300 dark:border-white/30 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",value:e.modelValue,onInput:l[0]||(l[0]=function(e){return o.$emit("update:modelValue",e.target.value)}),ref_key:"input",ref:t},null,40,r)}}}},1329:(e,t,o)=>{o.d(t,{Z:()=>c});var a=o(821),r={class:"block font-medium text-sm text-gray-700 dark:text-white/70"},l={key:0},n={key:1};const c={__name:"Label",props:["value"],setup:function(e){return function(t,o){return(0,a.openBlock)(),(0,a.createElementBlock)("label",r,[e.value?((0,a.openBlock)(),(0,a.createElementBlock)("span",l,(0,a.toDisplayString)(e.value),1)):((0,a.openBlock)(),(0,a.createElementBlock)("span",n,[(0,a.renderSlot)(t.$slots,"default")]))])}}}},8423:(e,t,o)=>{o.r(t),o.d(t,{default:()=>X});var a=o(821),r={class:"bg-white dark:bg-zinc-900 shadow"},l={class:"max-w-screen-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8"},n={class:"font-semibold text-xl text-theme-800 dark:text-white/90 my-auto"},c={class:"py-8"},i={class:"max-w-screen-2xl mx-auto sm:px-6 lg:px-8"},d={class:"bg-white dark:bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg"},s={class:"p-6 bg-white dark:bg-zinc-900 flex flex-col space-y-4"},m={class:"flex items-center space-x-4"},u=(0,a.createElementVNode)("div",{class:"text-theme-800 font-bold"},"Beneficiaries",-1),f={class:"flex items-center space-x-4"},p={class:"text-sm font-semibold text-theme-800"},y=["onClick"],h=["onClick"],v={class:"lg:grid grid-cols-2 lg:w-1/2"},b={class:"lg:grid grid-cols-2 lg:w-1/2"},V={class:"relative bg-white dark:bg-zinc-900 w-full mx-2 lg:mx-0 overflow-y-auto lg:w-96 h-auto max-h-[80%] p-6 rounded-lg"},k=(0,a.createElementVNode)("div",{class:"text-theme-800 font-bold"}," Add beneficiary ",-1),x={class:"mt-4"},N={key:0,class:"text-red-600"},g={class:"mt-4"},w={key:0,class:"text-red-600"},E={class:"mt-4"},B={key:0,class:"text-red-600"},C={class:"mt-4"},M={key:0,class:"text-red-600"},S=(0,a.createTextVNode)("Add"),D={key:0,class:"fixed inset-0 z-40 bg-black/50 backdrop-blur-md"},z={class:"relative bg-white dark:bg-zinc-900 w-full mx-2 lg:mx-0 overflow-y-auto lg:w-96 h-auto max-h-[80%] p-6 rounded-lg"},_=(0,a.createElementVNode)("div",{class:"text-theme-800 font-bold"}," Edit beneficiary ",-1),j={class:"mt-4"},A={key:0,class:"text-red-600"},U={class:"mt-4"},T={key:0,class:"text-red-600"},I={class:"mt-4"},Z={key:0,class:"text-red-600"},L={class:"mt-4"},F={key:0,class:"text-red-600"},$=(0,a.createTextVNode)("Update"),O={key:0,class:"fixed inset-0 z-40 bg-black/50 backdrop-blur-md"},P={class:"relative bg-white dark:bg-zinc-900 w-auto h-auto max-h-[80%] p-6 rounded-lg"},R=(0,a.createElementVNode)("div",null,[(0,a.createElementVNode)("span",{class:"font-bold text-lg block mb-2"},"Confirmation"),(0,a.createElementVNode)("span",{class:"font-normal text-sm"},"Are you really sure you want to delete this beneficiary?")],-1),H={class:"flex justify-end mt-6"},q={key:0,class:"fixed inset-0 z-40 bg-black/50 backdrop-blur-md"};var G=o(9018),J=o(1329),K=o(7887),Q=o(9038);const W={components:{Head:Q.Fb,BreezeButton:G.Z,BreezeLabel:J.Z,BreezeInput:K.Z,useForm:Q.cI,Link:Q.rU},setup:function(e){return{addform:(0,Q.cI)({member_id:e.member.id,name:"",relation:"",birthday:"",phone:""}),editform:(0,Q.cI)({name:"",relation:"",birthday:"",phone:""})}},props:{errors:Object,beneficiaries:Object,member:Object},methods:{editBeneficiary:function(e){this.editBeneficiaryModel=e,this.editform.name=e.name,this.editform.relation=e.relation,this.editform.birthday=e.birthday,this.editform.phone=e.phone,this.showEditModal=!0},deleteBeneficiary:function(){var e=this;this.$inertia.delete(route("beneficiaries.destroy",this.deleteBeneficiaryModel),{onSuccess:function(){e.showDeleteModal=!1}})}},data:function(){return{showEditModal:!1,showAddModal:!1,showDeleteModal:!1,editBeneficiaryModel:"",deleteBeneficiaryModel:""}}};const X=(0,o(3744).Z)(W,[["render",function(e,t,o,G,J,K){var Q=this,W=(0,a.resolveComponent)("Head"),X=(0,a.resolveComponent)("BreezeLabel"),Y=(0,a.resolveComponent)("BreezeInput"),ee=(0,a.resolveComponent)("BreezeButton");return(0,a.openBlock)(),(0,a.createElementBlock)(a.Fragment,null,[(0,a.createVNode)(W,{title:o.member.name},null,8,["title"]),(0,a.createElementVNode)("div",r,[(0,a.createElementVNode)("div",l,[(0,a.createElementVNode)("h2",n,(0,a.toDisplayString)(o.member.name),1)])]),(0,a.createElementVNode)("div",c,[(0,a.createElementVNode)("div",i,[(0,a.createElementVNode)("div",d,[(0,a.createElementVNode)("div",s,[(0,a.createElementVNode)("div",m,[u,(0,a.createElementVNode)("button",{type:"button",onClick:t[0]||(t[0]=function(e){return J.showAddModal=!0}),class:"text-xs px-3 py-2 border border-green-500 text-green-500 rounded-lg hover:bg-green-500 hover:text-white active:bg-green-500 active:text-white active:translate-y-0.5"},"Add")]),o.beneficiaries?((0,a.openBlock)(!0),(0,a.createElementBlock)(a.Fragment,{key:0},(0,a.renderList)(o.beneficiaries,(function(e,t){return(0,a.openBlock)(),(0,a.createElementBlock)("div",{key:t},[(0,a.createElementVNode)("div",f,[(0,a.createElementVNode)("span",p,(0,a.toDisplayString)("Beneficiary ".concat(t+1)),1),(0,a.createElementVNode)("div",null,[(0,a.createElementVNode)("i",{onClick:function(t){return K.editBeneficiary(e)},class:"bx bx-edit inline-flex items-center justify-center h-8 w-8 p-2 hover:bg-black/10 hover:text-green-500 rounded-full cursor-pointer"},null,8,y),(0,a.createElementVNode)("i",{onClick:function(t){return J.deleteBeneficiaryModel=e,J.showDeleteModal=!0},class:"bx bx-trash inline-flex items-center justify-center h-8 w-8 p-2 hover:bg-black/10 hover:text-red-500 rounded-full cursor-pointer"},null,8,h)])]),(0,a.createElementVNode)("div",v,[(0,a.createElementVNode)("div",null,"Name: "+(0,a.toDisplayString)(e.name),1),(0,a.createElementVNode)("div",null,"Relation: "+(0,a.toDisplayString)(e.relation),1)]),(0,a.createElementVNode)("div",b,[(0,a.createElementVNode)("div",null,"Birthday: "+(0,a.toDisplayString)(e.birthday),1),(0,a.createElementVNode)("div",null,"Phone number: "+(0,a.toDisplayString)(e.phone),1)])])})),128)):(0,a.createCommentVNode)("",!0)])])])]),(0,a.createElementVNode)("div",null,[(0,a.createVNode)(a.Transition,{"enter-active-class":"duration-200 ease-out","enter-from-class":"transform opacity-0 scale-75","enter-to-class":"opacity-100 scale-100","leave-active-class":"duration-200 ease-out","leave-from-class":"opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-75"},{default:(0,a.withCtx)((function(){return[J.showAddModal?((0,a.openBlock)(),(0,a.createElementBlock)("div",{key:0,class:"overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center",onClick:t[6]||(t[6]=(0,a.withModifiers)((function(e){return Q.showAddModal=!1}),["self"]))},[(0,a.createElementVNode)("div",V,[k,(0,a.createElementVNode)("form",{onSubmit:t[5]||(t[5]=(0,a.withModifiers)((function(t){G.addform.post(e.route("beneficiaries.store"),{preserveScroll:!0,onSuccess:function(){Q.showAddModal=!!o.errors.length,o.errors.length||G.addform.reset()}})}),["prevent"]))},[(0,a.createElementVNode)("div",x,[(0,a.createVNode)(X,{for:"name",value:"Name"}),(0,a.createVNode)(Y,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:G.addform.name,"onUpdate:modelValue":t[1]||(t[1]=function(e){return G.addform.name=e})},null,8,["modelValue"]),o.errors.name?((0,a.openBlock)(),(0,a.createElementBlock)("div",N,(0,a.toDisplayString)(o.errors.name),1)):(0,a.createCommentVNode)("",!0)]),(0,a.createElementVNode)("div",g,[(0,a.createVNode)(X,{for:"relation",value:"Relation"}),(0,a.createVNode)(Y,{id:"relation",type:"text",class:"mt-1 block w-full",modelValue:G.addform.relation,"onUpdate:modelValue":t[2]||(t[2]=function(e){return G.addform.relation=e})},null,8,["modelValue"]),o.errors.relation?((0,a.openBlock)(),(0,a.createElementBlock)("div",w,(0,a.toDisplayString)(o.errors.relation),1)):(0,a.createCommentVNode)("",!0)]),(0,a.createElementVNode)("div",E,[(0,a.createVNode)(X,{for:"birthday",value:"Birthday"}),(0,a.createVNode)(Y,{id:"birthday",type:"date",class:"mt-1 block w-full",modelValue:G.addform.birthday,"onUpdate:modelValue":t[3]||(t[3]=function(e){return G.addform.birthday=e})},null,8,["modelValue"]),o.errors.birthday?((0,a.openBlock)(),(0,a.createElementBlock)("div",B,(0,a.toDisplayString)(o.errors.birthday),1)):(0,a.createCommentVNode)("",!0)]),(0,a.createElementVNode)("div",C,[(0,a.createVNode)(X,{for:"phone",value:"Phone"}),(0,a.createVNode)(Y,{id:"phone",type:"text",class:"mt-1 block w-full",modelValue:G.addform.phone,"onUpdate:modelValue":t[4]||(t[4]=function(e){return G.addform.phone=e})},null,8,["modelValue"]),o.errors.phone?((0,a.openBlock)(),(0,a.createElementBlock)("div",M,(0,a.toDisplayString)(o.errors.phone),1)):(0,a.createCommentVNode)("",!0)]),(0,a.createVNode)(ee,{class:(0,a.normalizeClass)(["mt-4 w-full justify-center",{"opacity-25":G.addform.processing}]),disabled:G.addform.processing},{default:(0,a.withCtx)((function(){return[S]})),_:1},8,["class","disabled"])],32)])])):(0,a.createCommentVNode)("",!0)]})),_:1}),(0,a.createVNode)(a.Transition,{"enter-active-class":"duration-200 ease opacity-0","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"duration-200 ease opacity-90","leave-from-class":"opacity-90","leave-to-class":"transform opacity-0",appear:""},{default:(0,a.withCtx)((function(){return[J.showAddModal?((0,a.openBlock)(),(0,a.createElementBlock)("div",D)):(0,a.createCommentVNode)("",!0)]})),_:1})]),(0,a.createElementVNode)("div",null,[(0,a.createVNode)(a.Transition,{"enter-active-class":"duration-200 ease-out","enter-from-class":"transform opacity-0 scale-75","enter-to-class":"opacity-100 scale-100","leave-active-class":"duration-200 ease-out","leave-from-class":"opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-75"},{default:(0,a.withCtx)((function(){return[J.showEditModal?((0,a.openBlock)(),(0,a.createElementBlock)("div",{key:0,class:"overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center",onClick:t[12]||(t[12]=(0,a.withModifiers)((function(e){return Q.showEditModal=!1}),["self"]))},[(0,a.createElementVNode)("div",z,[_,(0,a.createElementVNode)("form",{onSubmit:t[11]||(t[11]=(0,a.withModifiers)((function(t){return G.editform.put(e.route("beneficiaries.update",J.editBeneficiaryModel),{preserveScroll:!0,preserveState:!1,onSuccess:function(){return Q.showEditModal=!1}})}),["prevent"]))},[(0,a.createElementVNode)("div",j,[(0,a.createVNode)(X,{for:"name",value:"Name"}),(0,a.createVNode)(Y,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:G.editform.name,"onUpdate:modelValue":t[7]||(t[7]=function(e){return G.editform.name=e})},null,8,["modelValue"]),o.errors.name?((0,a.openBlock)(),(0,a.createElementBlock)("div",A,(0,a.toDisplayString)(o.errors.name),1)):(0,a.createCommentVNode)("",!0)]),(0,a.createElementVNode)("div",U,[(0,a.createVNode)(X,{for:"relation",value:"Relation"}),(0,a.createVNode)(Y,{id:"relation",type:"text",class:"mt-1 block w-full",modelValue:G.editform.relation,"onUpdate:modelValue":t[8]||(t[8]=function(e){return G.editform.relation=e})},null,8,["modelValue"]),o.errors.relation?((0,a.openBlock)(),(0,a.createElementBlock)("div",T,(0,a.toDisplayString)(o.errors.relation),1)):(0,a.createCommentVNode)("",!0)]),(0,a.createElementVNode)("div",I,[(0,a.createVNode)(X,{for:"birthday",value:"Birthday"}),(0,a.createVNode)(Y,{id:"birthday",type:"date",class:"mt-1 block w-full",modelValue:G.editform.birthday,"onUpdate:modelValue":t[9]||(t[9]=function(e){return G.editform.birthday=e})},null,8,["modelValue"]),o.errors.birthday?((0,a.openBlock)(),(0,a.createElementBlock)("div",Z,(0,a.toDisplayString)(o.errors.birthday),1)):(0,a.createCommentVNode)("",!0)]),(0,a.createElementVNode)("div",L,[(0,a.createVNode)(X,{for:"phone",value:"Phone"}),(0,a.createVNode)(Y,{id:"phone",type:"text",class:"mt-1 block w-full",modelValue:G.editform.phone,"onUpdate:modelValue":t[10]||(t[10]=function(e){return G.editform.phone=e})},null,8,["modelValue"]),o.errors.phone?((0,a.openBlock)(),(0,a.createElementBlock)("div",F,(0,a.toDisplayString)(o.errors.phone),1)):(0,a.createCommentVNode)("",!0)]),(0,a.createVNode)(ee,{class:(0,a.normalizeClass)(["mt-4 w-full justify-center",{"opacity-25":G.editform.processing}]),disabled:G.editform.processing},{default:(0,a.withCtx)((function(){return[$]})),_:1},8,["class","disabled"])],32)])])):(0,a.createCommentVNode)("",!0)]})),_:1}),(0,a.createVNode)(a.Transition,{"enter-active-class":"duration-200 ease opacity-0","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"duration-200 ease opacity-90","leave-from-class":"opacity-90","leave-to-class":"transform opacity-0",appear:""},{default:(0,a.withCtx)((function(){return[J.showEditModal?((0,a.openBlock)(),(0,a.createElementBlock)("div",O)):(0,a.createCommentVNode)("",!0)]})),_:1})]),(0,a.createElementVNode)("div",null,[(0,a.createElementVNode)("div",null,[(0,a.createVNode)(a.Transition,{"enter-active-class":"duration-200 ease-out","enter-from-class":"transform opacity-0 scale-75","enter-to-class":"opacity-100 scale-100","leave-active-class":"duration-200 ease-out","leave-from-class":"opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-75"},{default:(0,a.withCtx)((function(){return[J.showDeleteModal?((0,a.openBlock)(),(0,a.createElementBlock)("div",{key:0,class:"overflow-auto inset-0 fixed z-50 h-screen w-screen flex justify-center items-center",onClick:t[15]||(t[15]=(0,a.withModifiers)((function(e){return Q.showDeleteModal=!1}),["self"]))},[(0,a.createElementVNode)("div",P,[R,(0,a.createElementVNode)("div",H,[(0,a.createElementVNode)("button",{class:"mx-2 text-sm hover:underline",onClick:t[13]||(t[13]=function(e){return Q.showDeleteModal=!1})},"Cancel"),(0,a.createElementVNode)("button",{onClick:t[14]||(t[14]=function(){return K.deleteBeneficiary&&K.deleteBeneficiary.apply(K,arguments)}),class:"mx-2 p-3 bg-red-600 hover:bg-red-700 active:bg-red-900 text-white text-sm rounded-lg"}," Delete")])])])):(0,a.createCommentVNode)("",!0)]})),_:1}),(0,a.createVNode)(a.Transition,{"enter-active-class":"duration-200 ease opacity-0","enter-from-class":"opacity-0","enter-to-class":"opacity-100","leave-active-class":"duration-200 ease opacity-90","leave-from-class":"opacity-90","leave-to-class":"transform opacity-0",appear:""},{default:(0,a.withCtx)((function(){return[J.showDeleteModal?((0,a.openBlock)(),(0,a.createElementBlock)("div",q)):(0,a.createCommentVNode)("",!0)]})),_:1})])])],64)}]])}}]);