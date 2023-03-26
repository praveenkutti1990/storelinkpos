<!-- WallacePOS: Copyright (c) 2014 WallaceIT <micwallace@gmx.com> <https://www.gnu.org/licenses/lgpl.html> -->
<div class="page-header">
    <h1>
        Information
        <small>
            <i class="icon-double-angle-right"></i>
            System Information
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-sm-6">
        <div class="widget-box transparent">
            <div class="widget-header widget-header-flat">
                <h4 class="lighter">Information</h4>
            </div>
            <div class="widget-body" style="padding-top: 10px;">
                <div class="row">
                    <div class="col-xs-2">Version: </div>
                    <div id="app_version" class="col-xs-10"></div>
                    <div class="space-30"></div>
                </div>
            </div>
        </div>
        <div class="widget-box transparent">
            <div class="widget-header widget-header-flat">
                <h4 class="lighter">Support & Development</h4>
            </div>
            <div class="widget-body" style="padding-top: 10px;">
                <p>Please refer here for information on support & development:<br />
                    <a href="https://www.storelink.xyz/" target="_blank">storelink.shop</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="widget-box transparent">
            <div class="widget-header widget-header-flat">
                <h4 class="lighter">Subscription</h4>
            </div>
            <div class="widget-body" style="padding-top: 10px;">
                <div class="row">
                    <div class="col-xs-2">Valid till:</div>
                    <div id="subs_days" class="col-xs-2"></div>
                </div>
                <div class="row">
                    <div class="col-xs-2">Plan:</div>
                    <div id="subs_plan" class="col-xs-2"></div>
                </div>
                <div class="row">
                    <div class="col-xs-2">Status:</div>
                    <div id="status" class="col-xs-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $("#app_version").text(WPOS.getConfigTable().general.version);
        $("#subs_days").text(WPOS.getConfigTable().exp_date.date);
        $("#subs_plan").text(WPOS.getConfigTable().plan.name);

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        today = mm+'/'+dd+'/'+yyyy;

        const expiry_date = new Date(WPOS.getConfigTable().exp_date.date);
        const current_date = new Date(today);
        const diffTime = Math.sign(expiry_date - current_date);
        //const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        if (diffTime == -1) {
            $("#status").text('Expired');
        }else{
            $("#status").text('Subscribed');
        }

        WPOS.util.hideLoader();
    });
</script>