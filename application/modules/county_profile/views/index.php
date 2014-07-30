<style>
.datepicker{z-index:1151 !important;}
</style>

<div class="row">
    <div class="map">

    <div class="outer">
    <h3>County Data on U5s & Women of Reproductive Age 2010</h3>
    <span class="map-info">*Click on a County to View Data</span>
        <div class="inner" id="map">
                    <script>
var map= new FusionMaps ("assets/fusionmaps/Maps/FCMap_KenyaCounty.swf","KenyaMap","100%","100%","0","0");
map.setJSONData(<?php
echo $maps; ?>
    );
    map.render("map");
                    </script>
                    <!--div class="content-separator"></div-->


        </div>
            <div class="map-footer" style="width:100%;padding:2%"><span><i class="fa fa-database"></i>Data Source : <span class="value">DHIS</span></span><span></span><span style="display:inline-block;width:10px;height:10px;background:#FFCC99"></span><span style="display:inline-block;margin-left:5px;font-size:120%">Targeted Site</span></div>
    </div>

    <div class="outer">
    <div class="inner-mini">

            <div class="stat" id="county">
 			<div class="icon"><i class="fa fa-map-marker" ></i></div>
                <div><span class="text">Kenya</span><span class="digit"></span>
            </div></div>
            <div class="stat" id="under5">
                <div class="icon" ><i class="fa fa-users"></i></div>
                <div>
                    <span class="text">Childen Under Five Years</span>
                    <span class="digit"><?php echo $childTotal; ?></span>
                </div>
            </div>
            <div class="stat" id="women">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div>
                    <span class="text">Women of Reproductive Age</span>
                    <span class="digit"><?php echo $womenTotal; ?></span>
                </div>
            </div>

        </div>
    </div>
    </div>
    <div class="standard-graph-lg">

    <div class="outer">
    <h3>Service Provision<i id="service_link" class="fa fa-external-link" data-toggle="tooltip" data-placement="bottom" title="Click for More"></i></h3>
    <div class="inner">
            <div class="summary"><span class="text">HCWs Trained in IMCI</span><span class="digit"><?php echo $tot_number ?></span></div>
            <div class="summary"><span class="text">Latest HCW Training</span><span class="digit"><?php echo $latest_training ?></span></div>
            <div id="imci_training">
                <div class="la-anim-1-mini"></div>
            </div>

        </div>
    </div>



    </div>


</div>

<script>
function run(data){
    $('.stat div').show();
    newData=data.split(',')
    $('#county .text').text(newData[0]);
    $('#under5 .text').text('Childen Under Five Years');
    $('#under5 .digit').text(numeral(newData[1],'0,0'));
    $('#women .text').text('Women of Reproductive Age');
    $('#women .digit').text(numeral(newData[2],'0,0'));
}

$('#baseline_total_mnh').load('<?php echo $this -> config -> item('project_url');?>/c_analytics/getTotalCounties/mnh');
$('#baseline_total_ch').load('<?php echo $this -> config -> item('project_url');?>/c_analytics/getTotalCounties/ch');

$('#imci_training').load('<?php echo base_url(); ?>imci/imci_training_county');

$('#baseline_total_mnh').delay(4000).queue(function(nxt) {
    $('#baseline_total_mnh').append('(MNH)');
    $('#baseline_total_ch').append('(CH)');
    nxt();

$('#service_link').click(function(){
    window.open('<?php echo base_url();?>imci',"_parent");

});
});


</script>
