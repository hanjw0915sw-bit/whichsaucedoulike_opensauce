// ⭐⭐⭐ 1. 캠퍼스 중심 좌표 설정 (위도, 경도 순) ⭐⭐⭐37.5828, 127.0108 37.2976, 126.8356
const CAMPUS_CENTER = [37.2976, 126.8356];

// 2. 지도 초기화 및 View 설정
const map = L.map('map').setView(CAMPUS_CENTER, 16);

// 3. OpenStreetMap(OSM) 타일 레이어 추가
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// 4. 초기 마커 추가
L.marker(CAMPUS_CENTER).addTo(map)
    .bindPopup("여기가 캠퍼스 중심입니다.")
    .openPopup();

// 5. Leaflet Routing Machine 컨트롤러 추가 (경로 찾기 UI 위젯) 
// 37.584, 127.011 37.2975, 126.8357  
// 37.580, 127.015 37.292, 126.8291
L.Routing.control({
    waypoints: [
        L.latLng(37.2975, 126.8357),
        L.latLng(37.292, 126.8291)
    ],
    routeWhileDragging: true,
    // Geocoder 라이브러리가 index.html에 추가되었으므로, 이제 주소 검색이 가능합니다!
    geocoder: L.Control.Geocoder.nominatim(),
    lineOptions: { styles: [{ color: 'blue', opacity: 0.7, weight: 6 }] }
}).addTo(map);


// 6. findRoute 함수 (경고창을 띄우는 코드는 제거하고 비워둡니다)
function findRoute() {
    console.log("경로 찾기 버튼이 눌렸습니다. 지도 위젯을 사용해 주세요.");
}
