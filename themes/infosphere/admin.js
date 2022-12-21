/**
 * admin.js
 * Appel tous les composantes lié à l'ADMIN
 */

//Importation des components
import "./components/editor";

//Ponyfill pour les CSS du thème seulement (assure le bon fonctionnement dans les vieux navigateurs)
import cssVars from "css-vars-ponyfill";
cssVars({
    include: "style, link#main-style-css"
});