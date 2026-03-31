/* =================================================
   SUVA - JavaScript funcional completo
   ================================================= */

/* =============================
   VARIABLES GLOBALES
   ============================= */

// Guarda puntaje por área
let resultados = {
  Lenguaje: 0,
  Matemáticas: 0,
  Sociales: 0,
  Naturales: 0,
  Inglés: 0,
  Pedagogía: 0
};

// Guarda qué preguntas ya se respondieron
let preguntasRespondidas = {};

/* =============================
   INICIAR EVALUACIÓN
   ============================= */
function iniciarEvaluacion() {
  const hero = document.querySelector(".hero");
  const evaluacion = document.getElementById("evaluacion");

  if (hero) {
    hero.style.display = "none"; // Oculta la pantalla inicial
  }

  if (evaluacion) {
    evaluacion.classList.remove("hidden");
    evaluacion.scrollIntoView({ behavior: "smooth" });
  }

  // Bloquea volver atrás
  history.pushState(null, null, location.href);
  window.onpopstate = function () {
    history.go(1);
  };
}

/* =============================
   REGISTRAR RESPUESTA
   ============================= */
function responder(area, valor, idPregunta) {
  // Evita contar dos veces la misma pregunta
  if (preguntasRespondidas[idPregunta]) {
    return;
  }

  preguntasRespondidas[idPregunta] = true;

  if (resultados[area] !== undefined) {
    resultados[area] += valor;
  }

  // Guardar en localStorage (opcional pero útil)
  localStorage.setItem("resultados_suva", JSON.stringify(resultados));
  localStorage.setItem("respondidas_suva", JSON.stringify(preguntasRespondidas));
}

/* =============================
   VER RESULTADOS
   ============================= */
function verResultados() {
  let texto = "RESULTADOS SUVA\n\n";

  for (let area in resultados) {
    texto += `${area}: ${resultados[area]} / 5\n`;
  }

  alert(texto);
}

/* =============================
   CAMBIO DE TEMA
   ============================= */
function cambiarTema() {
  const body = document.body;

  if (body.classList.contains("dark")) {
    body.classList.remove("dark");
    body.classList.add("light");
    localStorage.setItem("tema_suva", "light");
  } else {
    body.classList.remove("light");
    body.classList.add("dark");
    localStorage.setItem("tema_suva", "dark");
  }
}

/* =============================
   CARGAR TEMA GUARDADO
   ============================= */
window.addEventListener("DOMContentLoaded", () => {
  const temaGuardado = localStorage.getItem("tema_suva");
  if (temaGuardado === "dark") {
    document.body.classList.remove("light");
    document.body.classList.add("dark");
  }
});
