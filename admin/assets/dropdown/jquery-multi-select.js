jQuery(document).ready(function($) {
    var __prefix = 'm--s-';
    
    function multiSelect(options){
        
        options = options || {};

        this.rootClassName = '.' + options.rootClassName;
        this.rootDom = $(this.rootClassName);
        this.renderBaseDom();

        this.tags = {};
        this.listen = options.listen;

        this._ORDER_ATTR = options.orderBy;
        this._LABEL_ATTR = options.label;

        // 真正显示出来的options
        this.optionLists = options.data|| [];
        this.init();

    }

    // 渲染基础节点
    multiSelect.prototype.renderBaseDom = function(){

        $(`<div class="${__prefix}ipt">
                    <div class="${__prefix}tag-container">
                    </div>
                    <input type="text" class="${__prefix}real-ipt" value="">
                    <div class="${__prefix}list">
                    </div>
         </div>`).appendTo(this.rootDom);

    }

    multiSelect.prototype.getEl = function(name){
        return $(this.rootClassName + ' .' + __prefix + name);
    }

    multiSelect.prototype.getNamespace = function(name){
        return __prefix + name;
    }

    multiSelect.prototype.init = function(){

        // DOM
        this.LIST_EL = this.getEl('list');
        this.IPT_EL = this.getEl('ipt');
        this.REAL_IPT_EL = this.getEl('real-ipt');

        // 排序
        this.optionLists.sort((i1, i2)=>{
            return i1[this._ORDER_ATTR] - i2[this._ORDER_ATTR];
        });

        // 绑定事件
        this.bindEvent();
        // 渲染选项
        this.renderOptions();

    }

    // 绑定事件
    multiSelect.prototype.bindEvent = function(){

        this.IPT_EL.bind('click',this.showLists.bind(this));
        $('body').bind('click', this.hideLists.bind(this));
        this.IPT_EL.bind('mouseover', this.mouseover.bind(this));
        this.IPT_EL.bind('mouseout', this.mouseout.bind(this));

        this.REAL_IPT_EL.bind('input', this.iptChange.bind(this));
        this.REAL_IPT_EL[0].addEventListener('compositionend', this.iptCompositionEnd.bind(this), false);

    }

    // 聚焦
    multiSelect.prototype.showLists = function(){

        if(this.optionLists.length == 0){

            this.LIST_EL.css({
                display: 'none'
            })

        }else{

            this.LIST_EL.css({
                display: 'block'
            })

        }

        this.REAL_IPT_EL.focus();

        this.IPT_EL.css({
            border: '1px solid #00b1ff',
            boxShadow: '0 0 6px #eee,0 0 6px #eee inset'
        })

        this.LIST_EL.css({
            borderColor: '#00b1ff'
        })

    }

    multiSelect.prototype.hideLists = function(e){

        var target = e.target;

        if(!this.LIST_MOUSE_OVER_STATE){

            this.LIST_EL.css({
                display: 'none'
            });
            
            this.IPT_EL.css({
                border: '1px solid #aaa',
                boxShadow: 'none'
            });

            this.LIST_EL.css({
                borderColor: '#aaa'
            })
        }

    }

    multiSelect.prototype.mouseover = function(){

        this.LIST_MOUSE_OVER_STATE = true;

    }

    multiSelect.prototype.mouseout = function(){
        
        this.LIST_MOUSE_OVER_STATE = false;

    }

    function q(dom){
        return document.querySelectorAll(dom);
    }

    // 渲染选项
    multiSelect.prototype.renderOptions = function(){

        this.optionLists.forEach(item=>{

            var option = this.renderOptionItem(item,(function(item, multiSelectObj){
                
                return function(){
                    selectOption(item, multiSelectObj);
                }

            })(item, this));
            
            this.LIST_EL.append($(option));
        })
    }

    // 选择选项
    function selectOption(item, multiSelectObj){

        var removedIndex;

        for(var i = 0; i < multiSelectObj.optionLists.length ;i++){

            if(multiSelectObj.optionLists[i][multiSelectObj._ORDER_ATTR] == item[multiSelectObj._ORDER_ATTR]){
                removedIndex = i;
            }

        }

        multiSelectObj.renderTags(multiSelectObj.optionLists.splice(removedIndex, 1)[0]);
        multiSelectObj.removeOptions(removedIndex);

        multiSelectObj.listen(multiSelectObj.tags, item, 'add');

    }

    // 移除选项
    multiSelect.prototype.removeOptions = function(removedIndex){
    
        this.getEl('option')[removedIndex].remove();
        
    }

    // 渲染标签
    multiSelect.prototype.renderTags = function(obj){
    
        var tag = document.createElement('div');
        $(tag).addClass(this.getNamespace('tag'));
        $(tag).attr('value', obj[this._ORDER_ATTR]);

        var tagTxt = document.createElement('div');
        $(tagTxt).addClass(this.getNamespace('tag-txt'));
        tagTxt.innerHTML = obj[this._LABEL_ATTR];

        $(tag).append(tagTxt);

        // tag删除按钮
        var tagDel = document.createElement('div');
        $(tagDel).addClass(this.getNamespace('tag-del'));
        
        $(tagDel).bind('click', (e)=>{

            var target = e.target;
            var targetClassName = target.className.toLowerCase();

            if(targetClassName.includes('tag-txt') || targetClassName.includes('tag-del')){
                target = targetClassName.includes('tag-txt')?  target : target.parentNode;
                target.parentNode.removeChild(target);
                
                // 被插入的值和对象
                var insertedValue = target.getAttribute('value');
                var insertedObj = this.tags[target.getAttribute('value')];

                // 在tags中删除
                delete this.tags[target.getAttribute('value')];

                // 在options内部还原
                var insertedPos = this.optionLists.length;
                
                // 寻找插入位置
                var i = 0;

                while(i < this.optionLists.length){

                    if(Number(this.optionLists[i][this._ORDER_ATTR]) >= Number(insertedValue)){
                        insertedPos = i;
                        break;
                    }

                    i++;
                }

                this.listen(this.tags, insertedObj, 'delete');

                // 渲染选项
                var option = this.renderOptionItem(insertedObj, (function(item, multiSelectObj){
                
                    return function(){
                        selectOption(item, multiSelectObj);
                    }

                })(insertedObj, this));

                // 在底部插入
                if(insertedPos == this.optionLists.length){
                    this.LIST_EL.append($(option));
                    this.optionLists.push(insertedObj);

                }else{
                    //在某个位置插入
                    $(option).insertBefore(this.getEl('option').eq(insertedPos)[0]);

                    var preArr = this.optionLists.slice(0, insertedPos);
                    preArr.push(insertedObj);
                    var tailArr = this.optionLists.slice(insertedPos, this.optionLists.length);

                    this.optionLists = preArr.concat(tailArr);

                }

            }


        })

        $(tag).append($(tagDel));

        this.tags[obj[this._ORDER_ATTR]] = obj;
        
        this.getEl('tag-container').append($(tag));
    }

    /**
     * 渲染单个选项 
     */
    multiSelect.prototype.renderOptionItem = function (item, bindedFunc){

        var option = document.createElement('div');
            option.className = 'm--s-option';
            option.innerText = item[this._LABEL_ATTR];
            option.setAttribute('value', item[this._ORDER_ATTR])

        if(bindedFunc){

            $(option).bind('click', bindedFunc);

        }

        return option;
    }

    //非中文输入的时候进行搜索
    multiSelect.prototype.iptChange = function(e){

        if(!e.isComposing){
            this.search(this.REAL_IPT_EL.val());
        }

    }

    //中文输入完成才进行搜索
    multiSelect.prototype.iptCompositionEnd = function(e){

        this.search(this.REAL_IPT_EL.val());

    }


    // 过滤选项
    multiSelect.prototype.search = function(ipt){

        var domLists = this.getEl('option'), noneNumber = 0;

        for (let index = 0; index < this.optionLists.length; index++) {

            var item = this.optionLists[index];

            if(ipt.trim() == ''){

                domLists.eq(index).css({
                    display: 'block'
                })

            }

            if(!item[this._LABEL_ATTR].includes(ipt.trim())){

                domLists.eq(index).css({
                    display: 'none'
                })

                noneNumber ++;

            }else{

                domLists.eq(index).css({
                    display: 'block'
                })

            }
        }

        noneNumber == this.optionLists.length ?
             (this.getEl('list').css({display: 'none'})): 
                (this.getEl('list').css({display: 'block'}));
    }

    var timesInvoke = 0;
    var tags = {};

    $.extend({
        shellSort: function(list, compareFunc){
            
            for(gap = Math.floor(list.length/2); gap > 0;gap = Math.floor(gap/2)){

                for(var i = gap;i < list.length;i++){

                    var temp = list[i];
                    var j = i;

                    while(j-gap >= 0 && compareFunc(list[j-gap], temp)){
                        list[j] = list[j-gap];
                        list[j-gap] = temp;
                        j -= gap;
                    }
                }

            }
        }
    })

    $.fn.extend({
        // 多选插件
        multiSelect: function(options = {}){

            //first argument should be an Object!
            if(typeof options !== 'object' || options == null){
                throw new Error('first argument should be an Object! 参数必须为对象');
            }

            //arguments[0] must have the property of 'data'
            if(!Array.isArray(options.data)){
                throw new Error('arguments[0] must have the property of \'data\'! 参数中必须包含data属性，{text:\'选项名\',value:\'顺序名，必须为数值型\'}（其他属性为您需要的参数）');
            }

            var tagCommonPrefix = 'multi-select-' + timesInvoke ++;

            var opt = $.extend({
                rootClassName: tagCommonPrefix,
                listen: function(){},
                orderBy: 'value',
                label: 'text'
            },options);

            $(this).addClass(tagCommonPrefix);


            // 过滤器
            if(typeof options.compare == 'function'){

                $.shellSort(options.data, options.compare);
                options.data.map((item, index) =>{
                    item[opt.orderBy] = index;
                    return item;
                })
            }

            new multiSelect(opt);

            return ;
        }
    })



});
