function show_graphic_productivity(bulan, tahun) {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'dashboard/show_graphic_productivity',	
        data: { 
            bulan: bulan,
            tahun: tahun,
        },				
        beforeSend: function() {
            loading = new Loading(
                {
                    direction: 'hor',
                    discription: 'Loading...',
                    defaultApply: true,
                }
            );
        },
        complete: function() {
            loading.out();
        },
        success: function(response) {
            var label_persentase = response.series[0].name; // label persentase
            var label_target = response.series[1].name; // label target
            var label_average = response.series[2].name; // label average
            
            var productivity_chart = echarts.init(document.getElementById('dashboard_chart'));
            
            option = {
                tooltip: {
                    trigger: 'axis',
                },
                legend: {
                    data: [label_persentase, label_target, label_average]
                },
                toolbox: {
                    show: true,
                    feature: {
                        magicType: { show: false, type: ['line', 'bar'] },
                        restore: { show: true },
                        saveAsImage: { show: true }
                    }
                },
                color: ["#55ce63", "#009efb", "#FF5733"],
                calculable: true,
                xAxis: [{
                    type: 'category',
                    data: response.category
                }],
                yAxis: [{
                    type: 'value',
                    axisLabel: {
                        formatter: '{value}%'
                    }
                }],
                series: [{
                            name: label_target,
                            type: 'line',
                            data: [response.series[1]['data'][0], 
                                        response.series[1]['data'][1], 
                                        response.series[1]['data'][2], 
                                        response.series[1]['data'][3], 
                                        response.series[1]['data'][4], 
                                        response.series[1]['data'][5], 
                                        response.series[1]['data'][6], 
                                        response.series[1]['data'][7], 
                                        response.series[1]['data'][8], 
                                        response.series[1]['data'][9], 
                                        response.series[1]['data'][10], 
                                        response.series[1]['data'][11],
                                        response.series[1]['data'][12], 
                                        response.series[1]['data'][13], 
                                        response.series[1]['data'][14], 
                                        response.series[1]['data'][15], 
                                        response.series[1]['data'][16], 
                                        response.series[1]['data'][17], 
                                        response.series[1]['data'][18], 
                                        response.series[1]['data'][19], 
                                        response.series[1]['data'][20], 
                                        response.series[1]['data'][21], 
                                        response.series[1]['data'][22], 
                                        response.series[1]['data'][23],
                                        response.series[1]['data'][24], 
                                        response.series[1]['data'][25], 
                                        response.series[1]['data'][26], 
                                        response.series[1]['data'][27], 
                                        response.series[1]['data'][28], 
                                        response.series[1]['data'][29],
                                        response.series[1]['data'][30]],
                        },
                        {
                            name: label_persentase,
                            type: 'bar',
                            smooth: true,
                            data: [round(response.series[0]['data'][0], 2), 
                                        round(response.series[0]['data'][1], 2), 
                                        round(response.series[0]['data'][2], 2), 
                                        round(response.series[0]['data'][3], 2), 
                                        round(response.series[0]['data'][4], 2), 
                                        round(response.series[0]['data'][5], 2), 
                                        round(response.series[0]['data'][6], 2), 
                                        round(response.series[0]['data'][7], 2), 
                                        round(response.series[0]['data'][8], 2), 
                                        round(response.series[0]['data'][9], 2), 
                                        round(response.series[0]['data'][10], 2), 
                                        round(response.series[0]['data'][11], 2),
                                        round(response.series[0]['data'][12], 2), 
                                        round(response.series[0]['data'][13], 2), 
                                        round(response.series[0]['data'][14], 2), 
                                        round(response.series[0]['data'][15], 2), 
                                        round(response.series[0]['data'][16], 2), 
                                        round(response.series[0]['data'][17], 2), 
                                        round(response.series[0]['data'][18], 2), 
                                        round(response.series[0]['data'][19], 2), 
                                        round(response.series[0]['data'][20], 2), 
                                        round(response.series[0]['data'][21], 2), 
                                        round(response.series[0]['data'][22], 2), 
                                        round(response.series[0]['data'][23], 2),
                                        round(response.series[0]['data'][24], 2), 
                                        round(response.series[0]['data'][25], 2), 
                                        round(response.series[0]['data'][26], 2), 
                                        round(response.series[0]['data'][27], 2), 
                                        round(response.series[0]['data'][28], 2), 
                                        round(response.series[0]['data'][29], 2),
                                        round(response.series[0]['data'][30], 2)],
                            markPoint: {
                                data: [
                                    { type: 'max', name: 'The highest persentase' },
                                    { type: 'min', name: 'Persentase minimum' }
                                ]
                            },
                            /*markLine: {
                                data: [
                                    { type: 'average', name: 'Average' },
                                ]
                            }*/
                        },                        
                        {
                            name: label_average,
                            type: 'line',
                            data: [round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2),
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2),
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2), 
                                        round(response.value_average, 2),
                                        round(response.value_average, 2)],
                            markPoint: {
                                data: [
                                    { type: 'max', name: 'Average', position: 'end' },
                                ]
                            },
                        },                        
                ]
            };
            productivity_chart.setOption(option, true), $(function() {
                function resize() {
                    setTimeout(function() {
                        productivity_chart.resize()
                    }, 100)
                }
                $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
            });

            $('#table_productivity').html(response.table);

            $('#myLargeModalLabel').html('PRODUCTIVITY');
            $('#bs-example-modal-lg-1').modal('show');
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
}

function show_graphic_availability(bulan, tahun) {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'dashboard/show_graphic_availability',  
        data: { 
            bulan: bulan,
            tahun: tahun,
        },              
        beforeSend: function() {
            loading = new Loading(
                {
                    direction: 'hor',
                    discription: 'Loading...',
                    defaultApply: true,
                }
            );
        },
        complete: function() {
            loading.out();
        },
        success: function(response) {
            var label_availability = response.series[0].name; // label persentase
            
            var availability_chart = echarts.init(document.getElementById('dashboard_chart_availability'));
            
            option = {
                tooltip: {
                    trigger: 'axis',
                },
                legend: {
                    data: [label_availability]
                },
                toolbox: {
                    show: true,
                    feature: {
                        magicType: { show: false, type: ['line', 'bar'] },
                        restore: { show: true },
                        saveAsImage: { show: true }
                    }
                },
                color: ["#55ce63", "#009efb"],
                calculable: true,
                xAxis: [{
                    type: 'category',
                    data: response.category
                }],
                yAxis: [{
                    type: 'value',
                    axisLabel: {
                        formatter: '{value}%'
                    }
                }],
                series: [{
                            name: label_availability,
                            type: 'line',
                            data: [round(response.series[0]['data'][0], 2), 
                                        round(response.series[0]['data'][1], 2), 
                                        round(response.series[0]['data'][2], 2), 
                                        round(response.series[0]['data'][3], 2), 
                                        round(response.series[0]['data'][4], 2), 
                                        round(response.series[0]['data'][5], 2), 
                                        round(response.series[0]['data'][6], 2), 
                                        round(response.series[0]['data'][7], 2), 
                                        round(response.series[0]['data'][8], 2), 
                                        round(response.series[0]['data'][9], 2), 
                                        round(response.series[0]['data'][10], 2), 
                                        round(response.series[0]['data'][11], 2),
                                        round(response.series[0]['data'][12], 2), 
                                        round(response.series[0]['data'][13], 2), 
                                        round(response.series[0]['data'][14], 2), 
                                        round(response.series[0]['data'][15], 2), 
                                        round(response.series[0]['data'][16], 2), 
                                        round(response.series[0]['data'][17], 2), 
                                        round(response.series[0]['data'][18], 2), 
                                        round(response.series[0]['data'][19], 2), 
                                        round(response.series[0]['data'][20], 2), 
                                        round(response.series[0]['data'][21], 2), 
                                        round(response.series[0]['data'][22], 2), 
                                        round(response.series[0]['data'][23], 2),
                                        round(response.series[0]['data'][24], 2), 
                                        round(response.series[0]['data'][25], 2), 
                                        round(response.series[0]['data'][26], 2), 
                                        round(response.series[0]['data'][27], 2), 
                                        round(response.series[0]['data'][28], 2), 
                                        round(response.series[0]['data'][29], 2),
                                        round(response.series[0]['data'][30], 2)],
                            markPoint: {
                                data: [
                                    { type: 'max', name: 'The highest value' },
                                    { type: 'min', name: 'Value minimum' }
                                ]
                            },
                            markLine: {
                                data: [
                                    { type: 'average', name: 'Average' }
                                ]
                            }
                        },
                ]
            };
            availability_chart.setOption(option, true), $(function() {
                function resize() {
                    setTimeout(function() {
                        availability_chart.resize()
                    }, 100)
                }
                $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
            });

            $('#table_availability').html(response.table);

            $('#myLargeModalLabel_availability').html('AVAILABILITY');
            $('#bs-example-modal-lg-availability').modal('show');
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
}

function show_graphic_ok_rework(bulan, tahun) {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'dashboard/show_graphic_ok_rework',	
        data: { 
            bulan: bulan,
            tahun: tahun,
        },				
        beforeSend: function() {
            loading = new Loading(
                {
                    direction: 'hor',
                    discription: 'Loading...',
                    defaultApply: true,
                }
            );
        },
        complete: function() {
            loading.out();
        },
        success: function(response) {
            var label_part_ok = response.series[0].name; // label persentase
            var label_part_rework = response.series[1].name; // label target
            
            var ok_rework_chart = echarts.init(document.getElementById('dashboard_chart_ok_rework'));
            
            option = {
                tooltip: {
                    trigger: 'axis',
                },
                legend: {
                    data: [label_part_ok, label_part_rework]
                },
                toolbox: {
                    show: true,
                    feature: {
                        magicType: { show: false, type: ['line', 'bar'] },
                        restore: { show: true },
                        saveAsImage: { show: true }
                    }
                },
                color: ["#55ce63", "#009efb"],
                calculable: true,
                xAxis: [{
                    type: 'category',
                    data: response.category
                }],
                yAxis: [{
                    type: 'value',
                    axisLabel: {
                        formatter: '{value}%'
                    }
                }],
                series: [{
                            name: label_part_ok,
                            type: 'line',
                            data: [round(response.series[0]['data'][0], 2), 
                                        round(response.series[0]['data'][1], 2), 
                                        round(response.series[0]['data'][2], 2), 
                                        round(response.series[0]['data'][3], 2), 
                                        round(response.series[0]['data'][4], 2), 
                                        round(response.series[0]['data'][5], 2), 
                                        round(response.series[0]['data'][6], 2), 
                                        round(response.series[0]['data'][7], 2), 
                                        round(response.series[0]['data'][8], 2), 
                                        round(response.series[0]['data'][9], 2), 
                                        round(response.series[0]['data'][10], 2), 
                                        round(response.series[0]['data'][11], 2),
                                        round(response.series[0]['data'][12], 2), 
                                        round(response.series[0]['data'][13], 2), 
                                        round(response.series[0]['data'][14], 2), 
                                        round(response.series[0]['data'][15], 2), 
                                        round(response.series[0]['data'][16], 2), 
                                        round(response.series[0]['data'][17], 2), 
                                        round(response.series[0]['data'][18], 2), 
                                        round(response.series[0]['data'][19], 2), 
                                        round(response.series[0]['data'][20], 2), 
                                        round(response.series[0]['data'][21], 2), 
                                        round(response.series[0]['data'][22], 2), 
                                        round(response.series[0]['data'][23], 2),
                                        round(response.series[0]['data'][24], 2), 
                                        round(response.series[0]['data'][25], 2), 
                                        round(response.series[0]['data'][26], 2), 
                                        round(response.series[0]['data'][27], 2), 
                                        round(response.series[0]['data'][28], 2), 
                                        round(response.series[0]['data'][29], 2),
                                        round(response.series[0]['data'][30], 2)],
                            markPoint: {
                                data: [
                                    { type: 'max', name: 'The highest value' },
                                    { type: 'min', name: 'Value minimum' }
                                ]
                            },
                            markLine: {
                                data: [
                                    { type: 'average', name: 'Average' }
                                ]
                            }
                        },
                        {
                            name: label_part_rework,
                            type: 'line',
                            data: [round(response.series[1]['data'][0], 2), 
                                        round(response.series[1]['data'][1], 2), 
                                        round(response.series[1]['data'][2], 2), 
                                        round(response.series[1]['data'][3], 2), 
                                        round(response.series[1]['data'][4], 2), 
                                        round(response.series[1]['data'][5], 2), 
                                        round(response.series[1]['data'][6], 2), 
                                        round(response.series[1]['data'][7], 2), 
                                        round(response.series[1]['data'][8], 2), 
                                        round(response.series[1]['data'][9], 2), 
                                        round(response.series[1]['data'][10], 2), 
                                        round(response.series[1]['data'][11], 2),
                                        round(response.series[1]['data'][12], 2), 
                                        round(response.series[1]['data'][13], 2), 
                                        round(response.series[1]['data'][14], 2), 
                                        round(response.series[1]['data'][15], 2), 
                                        round(response.series[1]['data'][16], 2), 
                                        round(response.series[1]['data'][17], 2), 
                                        round(response.series[1]['data'][18], 2), 
                                        round(response.series[1]['data'][19], 2), 
                                        round(response.series[1]['data'][20], 2), 
                                        round(response.series[1]['data'][21], 2), 
                                        round(response.series[1]['data'][22], 2), 
                                        round(response.series[1]['data'][23], 2),
                                        round(response.series[1]['data'][24], 2), 
                                        round(response.series[1]['data'][25], 2), 
                                        round(response.series[1]['data'][26], 2), 
                                        round(response.series[1]['data'][27], 2), 
                                        round(response.series[1]['data'][28], 2), 
                                        round(response.series[1]['data'][29], 2),
                                        round(response.series[1]['data'][30], 2)],
                            markPoint: {
                                data: [
                                    { type: 'max', name: 'The highest value' },
                                    { type: 'min', name: 'Value minimum' }
                                ]
                            },
                            markLine: {
                                data: [
                                    { type: 'average', name: 'Average' }
                                ]
                            }
                        }
                ]
            };
            ok_rework_chart.setOption(option, true), $(function() {
                function resize() {
                    setTimeout(function() {
                        ok_rework_chart.resize()
                    }, 100)
                }
                $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
            });

            $('#table_ok_rework').html(response.table);

            $('#myLargeModalLabel_ok_rework').html('PART OK VS REWORK');
            $('#bs-example-modal-lg-ok-rework').modal('show');
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
}

function show_graphic_quality(bulan, tahun) {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'dashboard/show_graphic_quality',	
        data: { 
            bulan: bulan,
            tahun: tahun,
        },				
        beforeSend: function() {
            loading = new Loading(
                {
                    direction: 'hor',
                    discription: 'Loading...',
                    defaultApply: true,
                }
            );
        },
        complete: function() {
            loading.out();
        },
        success: function(response) {
            var label_quality = response.series[0].name; // label persentase
            
            var quality_chart = echarts.init(document.getElementById('dashboard_chart_quality'));
            
            option = {
                tooltip: {
                    trigger: 'axis',
                },
                legend: {
                    data: [label_quality]
                },
                toolbox: {
                    show: true,
                    feature: {
                        magicType: { show: false, type: ['line', 'bar'] },
                        restore: { show: true },
                        saveAsImage: { show: true }
                    }
                },
                color: ["#55ce63", "#009efb"],
                calculable: true,
                xAxis: [{
                    type: 'category',
                    data: response.category
                }],
                yAxis: [{
                    type: 'value',
                    axisLabel: {
                        formatter: '{value}%'
                    }
                }],
                series: [{
                            name: label_quality,
                            type: 'line',
                            data: [round(response.series[0]['data'][0], 2), 
                                        round(response.series[0]['data'][1], 2), 
                                        round(response.series[0]['data'][2], 2), 
                                        round(response.series[0]['data'][3], 2), 
                                        round(response.series[0]['data'][4], 2), 
                                        round(response.series[0]['data'][5], 2), 
                                        round(response.series[0]['data'][6], 2), 
                                        round(response.series[0]['data'][7], 2), 
                                        round(response.series[0]['data'][8], 2), 
                                        round(response.series[0]['data'][9], 2), 
                                        round(response.series[0]['data'][10], 2), 
                                        round(response.series[0]['data'][11], 2),
                                        round(response.series[0]['data'][12], 2), 
                                        round(response.series[0]['data'][13], 2), 
                                        round(response.series[0]['data'][14], 2), 
                                        round(response.series[0]['data'][15], 2), 
                                        round(response.series[0]['data'][16], 2), 
                                        round(response.series[0]['data'][17], 2), 
                                        round(response.series[0]['data'][18], 2), 
                                        round(response.series[0]['data'][19], 2), 
                                        round(response.series[0]['data'][20], 2), 
                                        round(response.series[0]['data'][21], 2), 
                                        round(response.series[0]['data'][22], 2), 
                                        round(response.series[0]['data'][23], 2),
                                        round(response.series[0]['data'][24], 2), 
                                        round(response.series[0]['data'][25], 2), 
                                        round(response.series[0]['data'][26], 2), 
                                        round(response.series[0]['data'][27], 2), 
                                        round(response.series[0]['data'][28], 2), 
                                        round(response.series[0]['data'][29], 2),
                                        round(response.series[0]['data'][30], 2)],
                            markPoint: {
                                data: [
                                    { type: 'max', name: 'The highest value' },
                                    { type: 'min', name: 'Value minimum' }
                                ]
                            },
                            markLine: {
                                data: [
                                    { type: 'average', name: 'Average' }
                                ]
                            }
                        },
                ]
            };
            quality_chart.setOption(option, true), $(function() {
                function resize() {
                    setTimeout(function() {
                        quality_chart.resize()
                    }, 100)
                }
                $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
            });

            $('#table_quality').html(response.table);

            $('#myLargeModalLabel_quality').html('QUALITY');
            $('#bs-example-modal-lg-quality').modal('show');
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
}

function show_graphic_scrap(bulan, tahun) {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'dashboard/show_graphic_scrap',	
        data: { 
            bulan: bulan,
            tahun: tahun,
        },				
        beforeSend: function() {
            loading = new Loading(
                {
                    direction: 'hor',
                    discription: 'Loading...',
                    defaultApply: true,
                }
            );
        },
        complete: function() {
            loading.out();
        },
        success: function(response) {
            var label_scrap = response.series[0].name; // label persentase
            var label_target = response.series[1].name; // label target
            
            var scrap_chart = echarts.init(document.getElementById('dashboard_chart_scrap'));
            
            option = {
                tooltip: {
                    trigger: 'axis',
                },
                legend: {
                    data: [label_scrap, label_target]
                },
                toolbox: {
                    show: true,
                    feature: {
                        magicType: { show: false, type: ['line', 'bar'] },
                        restore: { show: true },
                        saveAsImage: { show: true }
                    }
                },
                color: ["#55ce63", "#009efb"],
                calculable: true,
                xAxis: [{
                    type: 'category',
                    data: response.category
                }],
                yAxis: [{
                    type: 'value',
                    axisLabel: {
                        formatter: '{value}%'
                    }
                }],
                series: [{
                            name: label_scrap,
                            type: 'bar',
                            data: [round(response.series[0]['data'][0], 2), 
                                        round(response.series[0]['data'][1], 2), 
                                        round(response.series[0]['data'][2], 2), 
                                        round(response.series[0]['data'][3], 2), 
                                        round(response.series[0]['data'][4], 2), 
                                        round(response.series[0]['data'][5], 2), 
                                        round(response.series[0]['data'][6], 2), 
                                        round(response.series[0]['data'][7], 2), 
                                        round(response.series[0]['data'][8], 2), 
                                        round(response.series[0]['data'][9], 2), 
                                        round(response.series[0]['data'][10], 2), 
                                        round(response.series[0]['data'][11], 2),
                                        round(response.series[0]['data'][12], 2), 
                                        round(response.series[0]['data'][13], 2), 
                                        round(response.series[0]['data'][14], 2), 
                                        round(response.series[0]['data'][15], 2), 
                                        round(response.series[0]['data'][16], 2), 
                                        round(response.series[0]['data'][17], 2), 
                                        round(response.series[0]['data'][18], 2), 
                                        round(response.series[0]['data'][19], 2), 
                                        round(response.series[0]['data'][20], 2), 
                                        round(response.series[0]['data'][21], 2), 
                                        round(response.series[0]['data'][22], 2), 
                                        round(response.series[0]['data'][23], 2),
                                        round(response.series[0]['data'][24], 2), 
                                        round(response.series[0]['data'][25], 2), 
                                        round(response.series[0]['data'][26], 2), 
                                        round(response.series[0]['data'][27], 2), 
                                        round(response.series[0]['data'][28], 2), 
                                        round(response.series[0]['data'][29], 2),
                                        round(response.series[0]['data'][30], 2)],
                            markPoint: {
                                data: [
                                    { type: 'max', name: 'The highest value' },
                                    { type: 'min', name: 'Value minimum' }
                                ]
                            },
                            markLine: {
                                data: [
                                    { type: 'average', name: 'Average' }
                                ]
                            }
                        },
                        {
                            name: label_target,
                            type: 'line',
                            data: [response.series[1]['data'][0], 
                                        response.series[1]['data'][1], 
                                        response.series[1]['data'][2], 
                                        response.series[1]['data'][3], 
                                        response.series[1]['data'][4], 
                                        response.series[1]['data'][5], 
                                        response.series[1]['data'][6], 
                                        response.series[1]['data'][7], 
                                        response.series[1]['data'][8], 
                                        response.series[1]['data'][9], 
                                        response.series[1]['data'][10], 
                                        response.series[1]['data'][11],
                                        response.series[1]['data'][12], 
                                        response.series[1]['data'][13], 
                                        response.series[1]['data'][14], 
                                        response.series[1]['data'][15], 
                                        response.series[1]['data'][16], 
                                        response.series[1]['data'][17], 
                                        response.series[1]['data'][18], 
                                        response.series[1]['data'][19], 
                                        response.series[1]['data'][20], 
                                        response.series[1]['data'][21], 
                                        response.series[1]['data'][22], 
                                        response.series[1]['data'][23],
                                        response.series[1]['data'][24], 
                                        response.series[1]['data'][25], 
                                        response.series[1]['data'][26], 
                                        response.series[1]['data'][27], 
                                        response.series[1]['data'][28], 
                                        response.series[1]['data'][29],
                                        response.series[1]['data'][30]],
                        }
                ]
            };
            scrap_chart.setOption(option, true), $(function() {
                function resize() {
                    setTimeout(function() {
                        scrap_chart.resize()
                    }, 100)
                }
                $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
            });

            $('#table_scrap').html(response.table);

            $('#myLargeModalLabel_scrap').html('SCRAP');
            $('#bs-example-modal-lg-scrap').modal('show');
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
}

$(document).ready(function() {
    $.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
    });

    var d = new Date();
    var init_year = 2018;

    var current_month = d.getMonth()+1;
    var current_year = d.getFullYear();
    
    /* Productivity */
    $('body').on('click', '#show_modal_productivity', function () {
        $('#bulan').prop('selectedIndex', current_month-1);
        $('#tahun').prop('selectedIndex', current_year-init_year);
        show_graphic_productivity(current_month, current_year);
    });
    $('body').on('click', '#btn_show_graphic', function () {
        var n = parseInt($('#bulan').val())+1;
        var y = parseInt($('#tahun').val());
        show_graphic_productivity(n, y);
    });

    /* Availability */
    $('body').on('click', '#show_modal_availability', function () {
        $('#bulan_availability').prop('selectedIndex', current_month-1);
        $('#tahun_availability').prop('selectedIndex', current_year-init_year);
        show_graphic_availability(current_month, current_year);
    });
    $('body').on('click', '#btn_show_graphic_availability', function () {
        var n = parseInt($('#bulan_availability').val())+1;
        var y = parseInt($('#tahun_availability').val());
        show_graphic_availability(n, y);
    });

    /* OK - Rework */
    $('body').on('click', '#show_modal_ok_rework', function () {
        $('#bulan_ok_rework').prop('selectedIndex', current_month-1);
        $('#tahun_ok_rework').prop('selectedIndex', current_year-init_year);
        show_graphic_ok_rework(current_month, current_year);
    });
    $('body').on('click', '#btn_show_graphic_ok_rework', function () {
        var n = parseInt($('#bulan_ok_rework').val())+1;
        var y = parseInt($('#tahun_ok_rework').val());
        show_graphic_ok_rework(n, y);
    });

    /* Quality */
    $('body').on('click', '#show_modal_quality', function () {
        $('#bulan_quality').prop('selectedIndex', current_month-1);
        $('#tahun_quality').prop('selectedIndex', current_year-init_year);
        show_graphic_quality(current_month, current_year);
    });
    $('body').on('click', '#btn_show_graphic_quality', function () {
        var n = parseInt($('#bulan_quality').val())+1;
        var y = parseInt($('#tahun_quality').val());
        show_graphic_quality(n, y);
    });

    /* Scrap */
    $('body').on('click', '#show_modal_scrap', function () {
        $('#bulan_scrap').prop('selectedIndex', current_month-1);
        $('#tahun_scrap').prop('selectedIndex', current_year-init_year);
        show_graphic_scrap(current_month, current_year);
    });
    $('body').on('click', '#btn_show_graphic_scrap', function () {
        var n = parseInt($('#bulan_scrap').val())+1;
        var y = parseInt($('#tahun_scrap').val());
        show_graphic_scrap(n, y);
    });
});