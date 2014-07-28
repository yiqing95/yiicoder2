<div class="test-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>

<script type="text/javascript">
    if (!window.localStorage) {
        window.localStorage = {
            getItem: function (sKey) {
                if (!sKey || !this.hasOwnProperty(sKey)) { return null; }
                return unescape(document.cookie.replace(new RegExp("(?:^|.*;\\s*)" + escape(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*((?:[^;](?!;))*[^;]?).*"), "$1"));
            },
            key: function (nKeyId) { return unescape(document.cookie.replace(/\s*\=(?:.(?!;))*$/, "").split(/\s*\=(?:[^;](?!;))*[^;]?;\s*/)[nKeyId]); },
            setItem: function (sKey, sValue) {
                if(!sKey) { return; }
                document.cookie = escape(sKey) + "=" + escape(sValue) + "; path=/";
                this.length = document.cookie.match(/\=/g).length;
            },
            length: 0,
            removeItem: function (sKey) {
                if (!sKey || !this.hasOwnProperty(sKey)) { return; }
                var sExpDate = new Date();
                sExpDate.setDate(sExpDate.getDate() - 1);
                document.cookie = escape(sKey) + "=; expires=" + sExpDate.toGMTString() + "; path=/";
                this.length--;
            },
            hasOwnProperty: function (sKey) { return (new RegExp("(?:^|;\\s*)" + escape(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=")).test(document.cookie); }
        };
        window.localStorage.length = (document.cookie.match(/\=/g) || window.localStorage).length;
    }

        if(localStorage.getItem('myKey2')){
            alert('存在了！');
        }else{
            alert('不存在！');
            localStorage.setItem('myKey2','hi here your data!')
        }



</script>