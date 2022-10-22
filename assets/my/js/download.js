//手字母大写
// function titleCase(str) {
//     let strArr = str.split(' ');
//     for (let i = 0; i < strArr.length; i++) {
//         strArr[i] = strArr[i].substring(0, 1).toUpperCase()
//             + strArr[i].toLowerCase().substring(1)
//     }
//     return strArr.join(' ');
// }

jQuery(function ($) {
    $("pre code").each(function () {
        console.log( $(this).text());
        // var lines = $(this).text().split('\n').length;
        // var codename = titleCase($(this).attr("class").split(" ")[2]);
        // var str = "<div class='hljs header'>" +
        //     "<div class='tools' style='background-color: red'></div>" +
        //     "<div class='tools' style='background-color: yellow'></div>" +
        //     "<div class='tools' style='background-color:green'></div>  " +
        //     codename + "</div>";
        // $(this).parent().prepend(str);
        // $(this).css('padding-top', '0');
        // $(this).css('opacity', '0.95');
    });
    // $.getJSON('./assets/js/markers.json', function(data){
    //     var markers = data;
    //     console.log(markers);
    //     $('#world-map-markers').vectorMap({
    //         // map: 'world_mill_en',
    //         map:"cn_merc_en",
    //         normalizeFunction: 'polynomial',
    //         hoverOpacity: 0.7,
    //         hoverColor: false,
    //         backgroundColor: 'transparent',
    //         regionStyle: {
    //             initial: {
    //                 fill: 'rgba(210, 214, 222, 1)',
    //                 'fill-opacity': 1,
    //                 stroke: 'none',
    //                 'stroke-width': 0,
    //                 'stroke-opacity': 1
    //             },
    //             hover: {
    //                 'fill-opacity': 0.7,
    //                 cursor: 'pointer'
    //             },
    //             selected: {
    //                 fill: 'yellow'
    //             },
    //             selectedHover: {}
    //         },
    //         markerStyle: {
    //             initial: {
    //                 fill: '#00a65a',
    //                 stroke: '#111'
    //             }
    //         },
    //         markers: markers
    //         // markers: [
    //         //     {latLng: [30.584355, 114.298572], name: '武汉'},
    //         //     {latLng: [41.90, 12.45], name: 'Vatican City'},
    //         //     {latLng: [43.73, 7.41], name: 'Monaco'},
    //         //     {latLng: [-0.52, 166.93], name: 'Nauru'},
    //         //     {latLng: [-8.51, 179.21], name: 'Tuvalu'},
    //         //     {latLng: [43.93, 12.46], name: 'San Marino'},
    //         //     {latLng: [47.14, 9.52], name: 'Liechtenstein'},
    //         //     {latLng: [7.11, 171.06], name: 'Marshall Islands'},
    //         //     {latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis'},
    //         //     {latLng: [3.2, 73.22], name: 'Maldives'},
    //         //     {latLng: [35.88, 14.5], name: 'Malta'},
    //         //     {latLng: [12.05, -61.75], name: 'Grenada'},
    //         //     {latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines'},
    //         //     {latLng: [13.16, -59.55], name: 'Barbados'},
    //         //     {latLng: [17.11, -61.85], name: 'Antigua and Barbuda'},
    //         //     {latLng: [-4.61, 55.45], name: 'Seychelles'},
    //         //     {latLng: [7.35, 134.46], name: 'Palau'},
    //         //     {latLng: [42.5, 1.51], name: 'Andorra'},
    //         //     {latLng: [14.01, -60.98], name: 'Saint Lucia'},
    //         //     {latLng: [6.91, 158.18], name: 'Federated States of Micronesia'},
    //         //     {latLng: [1.3, 103.8], name: 'Singapore'},
    //         //     {latLng: [1.46, 173.03], name: 'Kiribati'},
    //         //     {latLng: [-21.13, -175.2], name: 'Tonga'},
    //         //     {latLng: [15.3, -61.38], name: 'Dominica'},
    //         //     {latLng: [-20.2, 57.5], name: 'Mauritius'},
    //         //     {latLng: [26.02, 50.55], name: 'Bahrain'},
    //         //     {latLng: [0.33, 6.73], name: 'São Tomé and Príncipe'}
    //         // ]
    //     });
    // });
});





