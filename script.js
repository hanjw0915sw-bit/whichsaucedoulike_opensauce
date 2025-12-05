// ⭐⭐⭐ 캠퍼스 중심 좌표를 실제 값으로 수정하세요! ⭐⭐⭐
const CAMPUS_CENTER = [37.5828, 127.0108];

// 지도 초기화 및 View 설정
const map = L.map('map').setView(CAMPUS_CENTER, 16);

// OpenStreetMap(OSM) 타일 레이어 추가
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors'
}).addTo(map);

// 초기 마커 추가
L.marker(CAMPUS_CENTER).addTo(map)
    .bindPopup("여기가 캠퍼스 중심입니다.")
    .openPopup();

// 길 찾기 함수
function findRoute() {
    const start = document.getElementById('start-input').value;
    const end = document.getElementById('end-input').value;

    if (!start || !end) {
        alert("출발지와 도착지를 모두 입력해 주세요.");
        return;
    }
    console.log(`길 찾기 요청: ${start}에서 ${end}로`);
}