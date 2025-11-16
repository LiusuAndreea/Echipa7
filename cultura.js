document.addEventListener("DOMContentLoaded", function () {
    const moodSelect = document.getElementById("moodSelect");
    const moodResult = document.getElementById("moodResult");

    if (!moodSelect || !moodResult) {
        // Dacă secțiunea nu există pe pagină, ieșim frumos
        return;
    }

    const mesajeMood = {
        relaxat:
            "Îți recomandăm o seară relaxată pe plaja Ipanema, cu un bol de Açaí și muzică bossa nova în fundal.",
        prieteni:
            "Adună-ți prietenii și mergeți în Lapa pentru o noapte cu samba, street food și multă energie.",
        autentic:
            "Pornește într-un tur local: feijoada la un restaurant de cartier, apoi un meci de fotbal urmărit alături de localnici."
    };

    moodSelect.addEventListener("change", function () {
        const valoare = moodSelect.value;

        if (valoare && mesajeMood[valoare]) {
            moodResult.textContent = mesajeMood[valoare];
        } else {
            moodResult.textContent =
                "Alege un mood din listă pentru a primi o recomandare.";
        }
    });
});
