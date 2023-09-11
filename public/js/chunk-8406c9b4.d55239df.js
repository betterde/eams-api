(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-8406c9b4","chunk-4c9f2f5c"],{"09ba":function(e,t,a){"use strict";var n=a("8d41"),s=a.n(n);s.a},"0ba0":function(e,t,a){},"124b":function(e,t,a){"use strict";a.r(t);var n=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"panel"},[a("div",{staticClass:"panel-header",class:e.classes},[a("div",{staticClass:"panel-tools"},[a("el-row",{attrs:{gutter:20}},[a("el-col",{staticStyle:{"text-align":"left"},attrs:{span:12}},[a("el-button",{attrs:{type:"info",plain:""},on:{click:function(t){return e.$router.back()}}},[e._v("Go back")])],1),a("el-col",{staticStyle:{"text-align":"right"},attrs:{span:12}},[e.profile.id===e.school.manager_id&&"student"===e.active?a("el-button",{attrs:{type:"primary",plain:""},on:{click:e.handleCreateStudent}},[e._v("Create")]):e.profile.id===e.school.manager_id&&"invitation"===e.active?a("el-button",{attrs:{type:"primary",plain:""},on:{click:e.handleTeacherInvitation}},[e._v("Create")]):e._e()],1)],1)],1)]),a("el-dialog",{attrs:{title:"Invitation",visible:e.invitation.dialog,width:"600px","close-on-click-modal":!1},on:{"update:visible":function(t){return e.$set(e.invitation,"dialog",t)},close:function(t){return e.handleClose("create")}}},[a("el-form",{ref:"invitation",attrs:{model:e.invitation.params,rules:e.invitation.rules,"label-position":"top"}},[a("el-form-item",{attrs:{label:"Email",prop:"email"}},[a("el-input",{attrs:{type:"string",clearable:""},model:{value:e.invitation.params.email,callback:function(t){e.$set(e.invitation.params,"email",t)},expression:"invitation.params.email"}})],1)],1),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.invitation.dialog=!1}}},[e._v("取消")]),a("el-button",{attrs:{type:"primary"},on:{click:function(t){return e.submit("invitation")}}},[e._v("确定")])],1)],1),a("el-dialog",{attrs:{title:"Student",visible:e.student.create.dialog,width:"600px","close-on-click-modal":!1},on:{"update:visible":function(t){return e.$set(e.student.create,"dialog",t)},close:function(t){return e.handleClose("create")}}},[a("el-form",{ref:"student",attrs:{model:e.student.create.params,rules:e.student.create.rules,"label-position":"top"}},[a("el-form-item",{attrs:{label:"Name",prop:"name"}},[a("el-input",{attrs:{type:"string",clearable:""},model:{value:e.student.create.params.name,callback:function(t){e.$set(e.student.create.params,"name",t)},expression:"student.create.params.name"}})],1),a("el-form-item",{attrs:{label:"Email",prop:"email"}},[a("el-input",{attrs:{type:"string",clearable:""},model:{value:e.student.create.params.email,callback:function(t){e.$set(e.student.create.params,"email",t)},expression:"student.create.params.email"}})],1),a("el-form-item",{attrs:{label:"Password",prop:"password"}},[a("el-input",{attrs:{type:"password","show-password":""},model:{value:e.student.create.params.password,callback:function(t){e.$set(e.student.create.params,"password",t)},expression:"student.create.params.password"}})],1)],1),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.student.create.dialog=!1}}},[e._v("取消")]),a("el-button",{attrs:{type:"primary"},on:{click:function(t){return e.submit("student")}}},[e._v("确定")])],1)],1),a("div",{staticClass:"panel-body",class:e.classes},[a("div",{staticClass:"details",staticStyle:{padding:"20px"}},[a("table",[a("tbody",[a("tr",[a("td",{staticClass:"detail-item"},[a("span",{staticClass:"detail-item-label detail-item-colon"},[e._v("ID")]),a("span",{staticClass:"detail-item-content"},[e._v(e._s(e.school.id))])]),a("td",{staticClass:"detail-item"},[a("span",{staticClass:"detail-item-label detail-item-colon"},[e._v("Name")]),a("span",{staticClass:"detail-item-content"},[e._v(e._s(e.school.name))])]),a("td",{staticClass:"detail-item"},[a("span",{staticClass:"detail-item-label detail-item-colon"},[e._v("Status")]),a("span",{staticClass:"detail-item-content"},[e._v(e._s(e.enums.school.status[e.school.status]))])]),a("td",{staticClass:"detail-item"},[a("span",{staticClass:"detail-item-label detail-item-colon"},[e._v("Manager")]),a("span",{staticClass:"detail-item-content"},[e._v(e._s(e.school.manager.name))])]),a("td",{staticClass:"detail-item"},[a("span",{staticClass:"detail-item-label detail-item-colon"},[e._v("Created At")]),a("span",{staticClass:"detail-item-content"},[e._v(e._s(e.school.created_at))])])])])])]),a("el-tabs",{on:{"tab-click":e.changeTab},model:{value:e.active,callback:function(t){e.active=t},expression:"active"}},[a("el-tab-pane",{attrs:{label:"Student",name:"student"}},[a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:e.student.loading,expression:"student.loading"}],ref:"pipeline",staticStyle:{width:"100%"},attrs:{data:e.students}},[a("el-table-column",{attrs:{prop:"id",label:"ID"}}),a("el-table-column",{attrs:{prop:"name",label:"Name"}}),a("el-table-column",{attrs:{prop:"email",label:"Email"}}),a("el-table-column",{attrs:{prop:"created_at",label:"Created At"}}),e.profile.id===e.school.manager_id?a("el-table-column",{attrs:{prop:"option",label:"Actions",width:"90"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-tooltip",{staticClass:"item",attrs:{effect:"dark",content:"Chat",placement:"top"}},[a("el-button",{attrs:{size:"mini",icon:"el-icon-chat-dot-round",plain:"",circle:"",disabled:e.school.manager_id!==e.profile.id},on:{click:function(a){return e.goToChat(t.row)}}})],1),a("el-tooltip",{staticClass:"item",attrs:{effect:"dark",content:"Delete",placement:"top"}},[a("el-button",{attrs:{size:"mini",icon:"el-icon-delete",type:"danger",plain:"",circle:"",disabled:e.profile.id===e.school.manager_id},on:{click:function(a){return e.handleDeleteStudent(t.row)}}})],1)]}}],null,!1,1196020343)}):e._e()],1),a("div",{staticClass:"pagination"},[a("el-pagination",{attrs:{background:"",layout:"sizes, total, prev, pager, next","page-size":e.student.query.size,"page-sizes":e.student.meta.page_sizes,"current-page":e.student.query.page,total:e.student.meta.total},on:{"update:currentPage":function(t){return e.$set(e.student.query,"page",t)},"update:current-page":function(t){return e.$set(e.student.query,"page",t)},"current-change":e.handleStudentsTableCurrentChange,"size-change":e.handleStudentsTableSizeChange}})],1)],1),e.profile.id===e.school.manager_id?a("el-tab-pane",{attrs:{label:"Teacher",name:"teacher"}},[a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:e.teacher.loading,expression:"teacher.loading"}],ref:"pipeline",staticStyle:{width:"100%"},attrs:{data:e.teachers}},[a("el-table-column",{attrs:{prop:"id",label:"ID"}}),a("el-table-column",{attrs:{prop:"name",label:"Name"}}),a("el-table-column",{attrs:{prop:"email",label:"Email"}}),a("el-table-column",{attrs:{prop:"pivot.role",label:"Role"}}),a("el-table-column",{attrs:{prop:"created_at",label:"Join At"}}),a("el-table-column",{attrs:{prop:"option",label:"Actions",width:"80"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-tooltip",{staticClass:"item",attrs:{effect:"dark",content:"Delete",placement:"top"}},[a("el-button",{attrs:{size:"mini",icon:"el-icon-delete",type:"danger",plain:"",circle:""},on:{click:function(a){return e.handleDeleteTeacher(t.row)}}})],1)]}}],null,!1,72176271)})],1),a("div",{staticClass:"pagination"},[a("el-pagination",{attrs:{background:"",layout:"sizes, total, prev, pager, next","page-size":e.teacher.query.size,"page-sizes":e.teacher.meta.page_sizes,"current-page":e.teacher.query.page,total:e.teacher.meta.total},on:{"update:currentPage":function(t){return e.$set(e.teacher.query,"page",t)},"update:current-page":function(t){return e.$set(e.teacher.query,"page",t)},"current-change":e.handleTeachersTableCurrentChange,"size-change":e.handleTeachersTableSizeChange}})],1)],1):e._e(),e.profile.id===e.school.manager_id?a("el-tab-pane",{attrs:{label:"Invitation",name:"invitation"}},[a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:e.invitation.loading,expression:"invitation.loading"}],ref:"pipeline",staticStyle:{width:"100%"},attrs:{data:e.invitations}},[a("el-table-column",{attrs:{prop:"id",label:"ID"}}),a("el-table-column",{attrs:{prop:"email",label:"Email"}}),a("el-table-column",{attrs:{prop:"initiator.name",label:"Initiator"}}),a("el-table-column",{attrs:{prop:"status",label:"Activated"},scopedSlots:e._u([{key:"default",fn:function(t){return[1===t.row.status?a("el-tag",[e._v("Yes")]):a("el-tag",{attrs:{type:"info"}},[e._v("No")])]}}],null,!1,3980982576)}),a("el-table-column",{attrs:{prop:"expires",label:"Expires"}}),a("el-table-column",{attrs:{prop:"created_at",label:"Join At"}}),a("el-table-column",{attrs:{prop:"option",label:"Actions",width:"80"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-tooltip",{staticClass:"item",attrs:{effect:"dark",content:"Delete",placement:"top"}},[a("el-button",{attrs:{size:"mini",icon:"el-icon-delete",type:"danger",plain:"",circle:""},on:{click:function(a){return e.handleDeleteTeacher(t.row)}}})],1)]}}],null,!1,72176271)})],1),a("div",{staticClass:"pagination"},[a("el-pagination",{attrs:{background:"",layout:"sizes, total, prev, pager, next","page-size":e.invitation.query.size,"page-sizes":e.teacher.meta.page_sizes,"current-page":e.invitation.query.page,total:e.teacher.meta.total},on:{"update:currentPage":function(t){return e.$set(e.invitation.query,"page",t)},"update:current-page":function(t){return e.$set(e.invitation.query,"page",t)},"current-change":e.handleTeachersTableCurrentChange,"size-change":e.handleTeachersTableSizeChange}})],1)],1):e._e()],1)],1)],1)},s=[],i=(a("8e6e"),a("ac6a"),a("456d"),a("bd86")),r=(a("7f7f"),a("2f62")),o=a("f8c8");function l(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,n)}return a}function c(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?l(a,!0).forEach((function(t){Object(i["a"])(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):l(a).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}var u={name:"Detail",data:function(){return{step:0,enums:{school:{status:["Unknown","Pending","Approved","Rejected"]}},active:"student",school:{id:"",name:"",status:"",manager:{id:"",name:""},manager_id:"",created_at:""},classes:["animated","fade-in","fast"],student:{loading:!1,query:{school_id:this.$route.params.id,only_followers:!1,size:5,page:1},meta:{total:0,page_sizes:[10,20,50]},create:{dialog:!1,params:{name:"",email:"",password:"",password_confirmation:"",school_id:this.$route.params.id},rules:{name:[{type:"string",required:!0,message:"Please enter student name",trigger:"blur"}],email:[{type:"email",required:!0,message:"Please enter email",trigger:"blur"}],password:[{type:"string",required:!0,message:"Please enter password",trigger:"blur"}]}}},teacher:{loading:!1,query:{school_id:this.$route.params.id,size:5,page:1},meta:{total:0,page_sizes:[10,20,50]}},invitation:{loading:!1,dialog:!1,query:{size:5,page:1,school_id:this.$route.params.id},params:{email:"",school_id:this.$route.params.id},meta:{total:0,page_sizes:[10,20,50]},rules:{email:[{type:"email",required:!0,message:"Please enter email",trigger:"blur"}]}},teachers:[],students:[],invitations:[]}},methods:{fetchSchool:function(){var e=this;this.$route.params.hasOwnProperty("id")?o["a"].school.fetchSchool(this.$route.params.id).then((function(t){e.school=t.data})).catch((function(t){e.$message.error({offset:95,message:t.message})})):this.$message.error({offset:95,message:"Missing school ID parameter"})},fetchTeachers:function(){var e=this;this.$route.params.hasOwnProperty("id")&&(this.teacher.loading=!0,o["a"].teacher.fetchTeachers(this.teacher.query).then((function(t){e.teachers=t.data,e.teacher.loading=!1,e.teacher.meta.total=t.total})).catch((function(t){e.$message.error({offset:95,message:t.message}),e.teacher.loading=!1})))},fetchStudents:function(){var e=this;this.$route.params.hasOwnProperty("id")&&(this.student.loading=!0,o["a"].student.fetchStudents(this.student.query).then((function(t){e.students=t.data,e.student.loading=!1,e.student.meta.total=t.total})).catch((function(t){e.$message.error({offset:95,message:t.message}),e.student.loading=!1})))},fetchInvitations:function(){var e=this;this.$route.params.hasOwnProperty("id")&&(this.invitation.loading=!0,o["a"].invitation.fetchInvitations(this.invitation.params).then((function(t){e.invitations=t.data,e.invitation.loading=!1,e.invitation.meta.total=t.total})).catch((function(t){e.$message.error({offset:95,message:t.message}),e.student.loading=!1})))},handleTeacherInvitation:function(){this.invitation.dialog=!0},handleCreateStudent:function(){this.student.create.dialog=!0},handleClose:function(e){switch(e){case"create":this.$refs.create.resetFields();break;case"update":break}},submit:function(e){var t=this;switch(e){case"invitation":this.$refs.invitation.validate((function(e){if(!e)return!1;o["a"].invitation.createInvitation(t.invitation.params).then((function(e){t.$message.success({offset:95,message:e.message}),t.fetchInvitations(),t.invitation.dialog=!1})).catch((function(e){t.$message.error({offset:95,message:e.message})}))}));break;case"student":this.$refs.student.validate((function(e){if(!e)return!1;t.student.create.params.password_confirmation=t.student.create.params.password,o["a"].student.createStudent(t.student.create.params).then((function(e){t.$message.success({offset:95,message:e.message}),t.fetchStudents(),t.student.create.dialog=!1})).catch((function(e){t.$message.error({offset:95,message:e.message})}))}));break}},goToChat:function(e){this.$router.push({path:"/chat/".concat(e.id)})},changeTab:function(e){"teacher"===e.name&&this.fetchTeachers(),"student"===e.name&&this.fetchStudents(),"invitation"===e.name&&this.fetchInvitations()},handleDeleteTeacher:function(e){var t=this;this.$confirm("此操作将删除订单中的商品，是否继续","警告",{confirmButtonText:"继续",cancelButtonText:"取消",type:"warning"}).then((function(){})).catch((function(){t.$message.info({offset:95,message:"Operation canceled"})}))},handleDeleteStudent:function(e){var t=this;this.$confirm("此操作将删除订单中的商品，是否继续","警告",{confirmButtonText:"继续",cancelButtonText:"取消",type:"warning"}).then((function(){})).catch((function(){t.$message.info({offset:95,message:"Operation canceled"})}))},handleTeachersTableCurrentChange:function(e){this.teacher.query.page=e,this.fetchTeachers()},handleTeachersTableSizeChange:function(e){this.teacher.query.size=e,this.fetchTeachers()},handleStudentsTableCurrentChange:function(e){this.student.query.page=e,this.fetchTeachers()},handleStudentsTableSizeChange:function(e){this.student.query.size=e,this.fetchTeachers()}},computed:c({},Object(r["b"])({profile:function(e){return e.account.profile}})),mounted:function(){this.invitation.params.school_id=this.$route.params.id,this.fetchSchool(),this.fetchStudents()}},d=u,p=(a("b66e"),a("2877")),h=Object(p["a"])(d,n,s,!1,null,null,null);t["default"]=h.exports},"28a5":function(e,t,a){"use strict";var n=a("aae3"),s=a("cb7c"),i=a("ebd6"),r=a("0390"),o=a("9def"),l=a("5f1b"),c=a("520a"),u=a("79e5"),d=Math.min,p=[].push,h="split",m="length",f="lastIndex",g=4294967295,b=!u((function(){RegExp(g,"y")}));a("214f")("split",2,(function(e,t,a,u){var v;return v="c"=="abbc"[h](/(b)*/)[1]||4!="test"[h](/(?:)/,-1)[m]||2!="ab"[h](/(?:ab)*/)[m]||4!="."[h](/(.?)(.?)/)[m]||"."[h](/()()/)[m]>1||""[h](/.?/)[m]?function(e,t){var s=String(this);if(void 0===e&&0===t)return[];if(!n(e))return a.call(s,e,t);var i,r,o,l=[],u=(e.ignoreCase?"i":"")+(e.multiline?"m":"")+(e.unicode?"u":"")+(e.sticky?"y":""),d=0,h=void 0===t?g:t>>>0,b=new RegExp(e.source,u+"g");while(i=c.call(b,s)){if(r=b[f],r>d&&(l.push(s.slice(d,i.index)),i[m]>1&&i.index<s[m]&&p.apply(l,i.slice(1)),o=i[0][m],d=r,l[m]>=h))break;b[f]===i.index&&b[f]++}return d===s[m]?!o&&b.test("")||l.push(""):l.push(s.slice(d)),l[m]>h?l.slice(0,h):l}:"0"[h](void 0,0)[m]?function(e,t){return void 0===e&&0===t?[]:a.call(this,e,t)}:a,[function(a,n){var s=e(this),i=void 0==a?void 0:a[t];return void 0!==i?i.call(a,s,n):v.call(String(s),a,n)},function(e,t){var n=u(v,e,this,t,v!==a);if(n.done)return n.value;var c=s(e),p=String(this),h=i(c,RegExp),m=c.unicode,f=(c.ignoreCase?"i":"")+(c.multiline?"m":"")+(c.unicode?"u":"")+(b?"y":"g"),y=new h(b?c:"^(?:"+c.source+")",f),_=void 0===t?g:t>>>0;if(0===_)return[];if(0===p.length)return null===l(y,p)?[p]:[];var w=0,C=0,k=[];while(C<p.length){y.lastIndex=b?C:0;var S,$=l(y,b?p:p.slice(C));if(null===$||(S=d(o(y.lastIndex+(b?0:C)),p.length))===w)C=r(p,C,m);else{if(k.push(p.slice(w,C)),k.length===_)return k;for(var x=1;x<=$.length-1;x++)if(k.push($[x]),k.length===_)return k;C=w=S}}return k.push(p.slice(w)),k}]}))},"33e6":function(e,t,a){"use strict";a.r(t);var n=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"main-content"},["list"!==e.action?a("el-page-header",{attrs:{title:"Go back",content:"Detail"},on:{back:function(t){return e.$router.back()}}}):e._e(),a(e.action,{tag:"component"})],1)},s=[],i=(a("28a5"),function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"panel"},[a("div",{staticClass:"panel-header",class:e.classes},[a("div",{staticClass:"panel-tools"},[a("el-row",{attrs:{gutter:20}},[a("el-col",{attrs:{xs:24,span:6}},[a("el-input",{attrs:{placeholder:"Search schools by typing here",clearable:""},on:{clear:e.handleClear},nativeOn:{keyup:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.fetchSchools(t)}},model:{value:e.params.search,callback:function(t){e.$set(e.params,"search",t)},expression:"params.search"}},[a("i",{staticClass:"el-input__icon el-icon-search",attrs:{slot:"prefix"},slot:"prefix"})])],1),a("el-col",{attrs:{xs:12,span:2}},[a("el-button",{attrs:{type:"primary",icon:"el-icon-search",plain:""},on:{click:e.fetchSchools}},[e._v("Search")])],1),a("el-col",{staticStyle:{"text-align":"right"},attrs:{xs:12,span:16}},[a("el-button",{attrs:{type:"primary",plain:""},on:{click:e.handleCreate}},[e._v("Create")])],1)],1)],1)]),a("el-dialog",{attrs:{title:"Create school",visible:e.create.dialog,width:"600px","close-on-click-modal":!1},on:{"update:visible":function(t){return e.$set(e.create,"dialog",t)},close:function(t){return e.handleClose("create")}}},[a("el-form",{ref:"create",attrs:{model:e.create.params,rules:e.create.rules,"label-position":"top"}},[a("el-row",{attrs:{gutter:20}},[a("el-col",{attrs:{span:24}},[a("el-form-item",{attrs:{label:"Name",prop:"name"}},[a("el-input",{attrs:{placeholder:"Please enter the school name"},model:{value:e.create.params.name,callback:function(t){e.$set(e.create.params,"name",t)},expression:"create.params.name"}})],1)],1)],1)],1),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.create.dialog=!1}}},[e._v("取消")]),a("el-button",{attrs:{type:"primary"},on:{click:function(t){return e.submit("create")}}},[e._v("确定")])],1)],1),a("div",{staticClass:"panel-body",class:e.classes},[a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:e.loading,expression:"loading"}],staticStyle:{width:"100%"},attrs:{data:e.schools}},[a("el-table-column",{attrs:{prop:"id",label:"ID",width:"300"}}),a("el-table-column",{attrs:{prop:"name",label:"Name"}}),a("el-table-column",{attrs:{prop:"status",label:"Status"},scopedSlots:e._u([{key:"default",fn:function(t){return[1===t.row.status?a("el-tag",{attrs:{type:"info"}},[e._v(e._s(e.enums.school.status[t.row.status]))]):2===t.row.status?a("el-tag",{attrs:{type:"success"}},[e._v(e._s(e.enums.school.status[t.row.status]))]):3===t.row.status?a("el-tag",{attrs:{type:"danger"}},[e._v(e._s(e.enums.school.status[t.row.status]))]):e._e()]}}])}),a("el-table-column",{attrs:{prop:"manager.name",label:"Manager"}}),a("el-table-column",{attrs:{prop:"created_at",label:"Created At"}}),a("el-table-column",{attrs:{prop:"option",label:"Actions",width:"130"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-tooltip",{staticClass:"item",attrs:{effect:"dark",content:"Detail",placement:"top"}},[a("el-button",{attrs:{size:"mini",icon:"el-icon-tickets",plain:"",circle:"",disabled:1===t.row.status},on:{click:function(a){return e.viewDetails(t.row)}}})],1),a("el-tooltip",{staticClass:"item",attrs:{effect:"dark",content:"Delete",placement:"top"}},[a("el-button",{attrs:{size:"mini",icon:"el-icon-delete",type:"danger",plain:"",circle:"",disabled:t.row.manager_id!==e.profile.id},on:{click:function(a){return e.handleDelete(t.row)}}})],1)]}}])})],1),a("div",{staticClass:"pagination"},[a("el-pagination",{attrs:{background:"",layout:e.meta.layout,"page-size":e.params.size,total:e.meta.total,"pager-count":e.meta.pager_count,"page-sizes":e.meta.page_sizes,"current-page":e.params.current_page},on:{"update:currentPage":function(t){return e.$set(e.params,"current_page",t)},"update:current-page":function(t){return e.$set(e.params,"current_page",t)},"current-change":e.handleCurrentChange,"size-change":e.handleSizeChange}})],1)],1)],1)}),r=[],o=(a("8e6e"),a("ac6a"),a("456d"),a("bd86")),l=a("2f62"),c=a("f8c8");function u(e,t){var a=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),a.push.apply(a,n)}return a}function d(e){for(var t=1;t<arguments.length;t++){var a=null!=arguments[t]?arguments[t]:{};t%2?u(a,!0).forEach((function(t){Object(o["a"])(e,t,a[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(a)):u(a).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(a,t))}))}return e}var p={name:"OrderList",data:function(){return{enums:{school:{status:["Unknown","Pending","Approved","Rejected"]}},loading:!1,classes:["animated","fade-in","fast"],handlers:[{label:"file_server",value:"file_server"}],params:{size:10,search:"",current_page:1},create:{dialog:!1,params:{name:""},rules:{name:[{type:"string",required:!0,message:"Please enter the school name",trigger:"change"}]}},schools:[],meta:{total:0,pager_count:11,page_sizes:[10,20,50],layout:"sizes, total, prev, pager, next"}}},methods:{handleCurrentChange:function(e){this.params.page=e,this.fetchSchools()},handleClose:function(e){switch(e){case"create":this.$refs.create.resetFields(),this.create.dialog=!1;break;case"update":this.$refs.update.resetFields(),this.update.dialog=!1,this.update.id=null,this.update.index=null;break}},submit:function(e){var t=this;switch(e){case"create":this.$refs.create.validate((function(a){if(!a)return!1;c["a"].server.createServer(t.create.params).then((function(a){t.handleClose(e),t.$message.success({offset:95,message:a.message}),t.fetchSchools()})).catch((function(e){t.$message.error({offset:95,message:e.message})}))}));break;case"update":c["a"].server.updateServer(this.update.id,this.update.params).then((function(a){t.$message.success({offset:95,message:a.message}),t.fetchSchools(),t.handleClose(e)})).catch((function(e){t.$message.error({offset:95,message:e.message})}));break}},handleCreate:function(){this.create.dialog=!0},handleDelete:function(e){var t=this;this.$confirm("此操作将删除服务器，是否继续","警告",{confirmButtonText:"继续",cancelButtonText:"取消",type:"warning"}).then((function(){c["a"].server.deleteServer(e.id).then((function(e){t.$message({type:"success",offset:95,message:e.message}),t.fetchSchools()})).catch((function(e){t.$message.error({offset:95,message:e.message})}))})).catch((function(){t.$message.info({offset:95,message:"操作已取消"})}))},viewDetails:function(e){this.$router.push({path:"/school/".concat(e.id,"/detail")})},handleClear:function(){this.fetchSchools()},handleSizeChange:function(e){this.params.size=e,this.fetchSchools()},fetchSchools:function(){var e=this;this.loading=!0,c["a"].school.fetchSchools(this.params).then((function(t){e.schools=t.data,e.params.current_page=t.current_page,e.meta.total=t.total,e.loading=!1})).catch((function(t){e.$message.error({offset:95,message:t.message})}))}},computed:d({},Object(l["b"])({profile:function(e){return e.account.profile}})),mounted:function(){document.body.clientWidth<767&&(this.meta.pager_count=5,this.meta.layout="prev, pager, next"),this.fetchSchools()}},h=p,m=(a("a580"),a("2877")),f=Object(m["a"])(h,i,r,!1,null,null,null),g=f.exports,b=a("124b"),v={name:"School",data:function(){return{breadcrumbs:[],filtered:!1,action:"list",actions:{detail:{path:null,label:"订单详情"}}}},methods:{},components:{list:g,detail:b["default"]},watch:{$route:function(e){var t=e.path.split("/");if(t.length>2){this.action=t.pop(),this.breadcrumbs.push({path:"/order",label:"订单管理"});var a=this.actions[this.action];this.breadcrumbs.push(a)}else this.action="list";"list"===this.action&&(this.breadcrumbs=[])}},mounted:function(){var e=this.$route.path.split("/");if(e.length>2){this.action=e.pop(),this.breadcrumbs.push({path:"/order",label:"订单管理"});var t=this.actions[this.action];this.breadcrumbs.push(t)}else this.action="list"}},y=v,_=(a("09ba"),Object(m["a"])(y,n,s,!1,null,null,null));t["default"]=_.exports},"5c90":function(e,t,a){},"8d41":function(e,t,a){},a580:function(e,t,a){"use strict";var n=a("0ba0"),s=a.n(n);s.a},aae3:function(e,t,a){var n=a("d3f4"),s=a("2d95"),i=a("2b4c")("match");e.exports=function(e){var t;return n(e)&&(void 0!==(t=e[i])?!!t:"RegExp"==s(e))}},b66e:function(e,t,a){"use strict";var n=a("5c90"),s=a.n(n);s.a}}]);
//# sourceMappingURL=chunk-8406c9b4.d55239df.js.map