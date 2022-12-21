//importer les feuille de styles
import '../gabarit-universel/assets/styles/core.scss';
import "bootstrap";

//Importation des components
import "./components/index";

//Ponyfill pour les CSS du thème seulement (assure le bon fonctionnement dans les vieux navigateurs)
import cssVars from "css-vars-ponyfill";
cssVars({
    include: "style, link#main-style-css"
});