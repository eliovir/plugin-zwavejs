<?php
/* This file is part of Plugin openzwave for jeedom.
*
* Plugin openzwave for jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Plugin openzwave for jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Plugin openzwave for jeedom. If not, see <http://www.gnu.org/licenses/>.
*/

if (!isConnect('admin')) {
	throw new Exception('401 Unauthorized');
}
sendVarToJs('nodeId', init('id'));

include_file('3rdparty', 'jsonTree/jsonTree', 'css', 'zwavejs');
include_file('3rdparty', 'jsonTree/jsonTree', 'js', 'zwavejs');
?>


<div id="div_nodeInformationsZwaveJsAlert" style="display: none;"></div>


<div class="modalNodeInformations">
	<div class="container-fluid">
		<div id="content">
			<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
				<li id="tab-summary" class="active"><a href="#summary" data-toggle="tab"><i class="fas fa-tachometer-alt"></i> {{Résumé}}</a></li>
				<li id="tab-actions"><a href="#actions" data-toggle="tab"><i class="fas fa-sliders-h"></i> {{Actions}}</a></li>
				<li id="tab-stats"><a href="#statistics" data-toggle="tab"><i class="fas fa-chart-bar"></i> {{Statistiques}}</a></li>
				<li id="tab-stats"><a href="#tree" data-toggle="tab"><i class="fas fa-tree"></i> {{Arbre}}</a></li>
			</ul>
			<div id="my-tab-content" class="tab-content">
				<div class="tab-pane active" id="summary">
					<br>
					<div class="col-sm-12">
					<div class="col-sm-6">
						<div class="panel panel-primary template">
							<div class="panel-heading">
								<h4 class="panel-title"><i class="fas fa-info-circle"></i> {{Informations Noeud}}</h4>
							</div>
							<div class="panel-body">
								<p><b>{{Node id : }} </b><span class="getNodeInfo-id label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Modèle :}} </b><span class="getNodeInfo-productLabel label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Fabricant : }}</b><span class="getNodeInfo-manufacturer label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Description : }}</b><span class="getNodeInfo-productDescription label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Identifiant : }}</b><span class="getNodeInfo-deviceIdNew label label-info" style="font-size : 1em;"></span> <span class="getNodeInfo-hexId label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Firmware : }}</b><span class="getNodeInfo-firmwareVersion label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Nombres d'endpoints : }}</b><span class="getNodeInfo-endpointsCount label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Nombres de groupes : }}</b><span class="getNodeInfo-numberGroups label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Configuration : }}</b><span class="getNodeInfo-filename label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Configuration Jeedom : }}</b><span class="getNodeInfo-confJeedom label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Lien : }}</b><b><span class="getNodeInfo-dbLink label label-default" style="font-size : 1em;"></span></b></p>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel panel-primary template">
						<div class="panel-heading">
							<h4 class="panel-title"><i class="fas fa-heartbeat"></i> {{Statut Noeud}}</h4>
						</div>
						<div class="panel-body">
							<p><b>{{Statut : }}</b><span class="getNodeInfo-status label label-info" style="font-size : 1em;"></span></p>
							<p><b>{{Initié : }}</b><span class="getNodeInfo-inited label label-info" style="font-size : 1em;"></span></p>
							<p><b>{{Stage : }}</b><span class="getNodeInfo-interviewStage label label-info" style="font-size : 1em;"></span></p>
							<p><b>{{Prêt : }} </b><span class="getNodeInfo-ready label label-info" style="font-size : 1em;"></span></p>
							<p><b>{{Disponible : }}</b> <span class="getNodeInfo-available label label-info" style="font-size : 1em;"></span></p>
							<p><b>{{En échec : }} </b><span class="getNodeInfo-failed label label-info" style="font-size : 1em;"></span></p>
							<p><b>{{Voisins : }}</b> <span class="getNodeInfo-neighbors label label-info" style="font-size : 1em;"></span></p>
							<p><b>{{Dernière activité : }}</b><span class="getNodeInfo-lastActive label label-info" style="font-size : 1em;"></span></p>
							</div>
						</div>
						</div>
					</div>
					<div class="col-sm-12">
					<div class="col-sm-6">
						<div class="panel panel-primary template">
							<div class="panel-heading">
								<h4 class="panel-title"><i class="fas fa-wifi"></i> {{Informations Protocole}}
								</h4>
							</div>
							<div class="panel-body">
								<p><b>{{Vitesse maximale : }}</b><span class="getNodeInfo-maxDataRate label label-info"></span> {{bit/sec}}</p>
								<p><b>{{Version Protocole : }} </b><span class="getNodeInfo-protocolVersion label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{FLIRS : }} </b><span class="getNodeInfo-isFrequentListening label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Contrôleur : }} </b><span class="getNodeInfo-isControllerNode label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Routing : }} </b><span class="getNodeInfo-isRouting label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Beaming : }} </b><span class="getNodeInfo-supportsBeaming label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Keep Awake : }} </b><span class="getNodeInfo-keepAwake label label-info" style="font-size : 1em;"></span></p>
								<p><b>{{Listening : }} </b><span class="getNodeInfo-isListening label label-info" style="font-size : 1em;"></span></p>
							</div>
						</div>
						</div>
					<div class="col-sm-6">
						<div class="panel panel-primary template">
							<div class="panel-heading">
								<h4 class="panel-title"><i class="fas fa-clipboard-list"></i> {{Classe du module}}</h4>
							</div>
							<div class="panel-body">
								<p><b>{{Basique :}} </b><span class="getNodeInfo-classBasic label label-info"></span></p>
								<p><b>{{Générique :}} </b><span class="getNodeInfo-classGeneric label label-info"></span></p>
								<p><b>{{Spécifique :}} </b><span class="getNodeInfo-classSpecific label label-info"></span></p>
							</div>
						</div>
						</div>
					</div>
					</div>
					<div class="tab-pane" id="actions">
						<table class="table table-striped">
							<tr>
								<td><a data-action="pingNode" class="btn btn-primary nodeAction"><i class="fas fa-sitemap"></i> {{Ping du nœud}}</a></td>
								<td>{{Fait un ping du nœud.}}</td>
							</tr>
							<tr>
								<td><a data-action="healNode" class="btn btn-success nodeAction"><i class="fas fa-medkit"></i> {{Soigner le nœud}}</a></td>
								<td>{{Soigner le nœud au sein du réseau.}}</td>
							</tr>
							<tr>
								<td><a data-action="refreshValues" class="btn btn-success nodeAction"><i class="fas fa-sync-alt"></i> {{Rafraîchir les valeurs du nœud}}</a></td>
								<td>{{Demande l'actualisation de l'ensemble des valeurs du nœud.}}</td>
							</tr>
							<tr>
								<td><a class="btn btn-success namingAction"><i class="fas fa-bookmark"></i> {{Envoyer le nom d'équipement}}</a></td>
								<td>{{Enverra le noms et objet de l'équipements au réseau Zwave.}}</td>
							</tr>
							<tr>
								<td><a data-action="refreshInfo" class="btn btn-warning nodeAction"><i class="fas fa-retweet"></i> {{Rafraîchir le nœud}}</a></td>
								<td>{{Déclencher l'obtention des informations du nœud.}} <br>{{Les données du nœud sont obtenues du réseau Z-Wave de la même façon que s'il venait d'être ajouté.}}</td>
							</tr>
							<tr>
								<td><a data-action="isFailedNode" class="btn btn-primary nodeAction"><i class="fas fa-heartbeat"></i> {{Nœud en échec ?}}</a></td>
								<td>{{Vérifie si le nœud est dans la liste des nœuds en erreur.}}</td>
							</tr>
							<tr>
								<td><a data-action="removeFailedNode" class="btn btn-danger nodeAction"><i class="fas fa-times"></i> {{Supprimer le nœud du réseau}}</a></td>
								<td>{{Permet de supprimer un nœud du réseau.}}</td>
							</tr>
						</table>
					</div>
					<div class="tab-pane" id="statistics">
						<table class="table table-condensed table-striped">
						<tr>
							<td><b>{{Messages transmis TX :}}</b></td>
							<td><span class="getNodeStats-commandsTX"></span></td>
						</tr>
						<tr>
							<td><b>{{Messages reçus RX :}}</b></td>
							<td><span class="getNodeStats-commandsRX"></span></td>
						</tr>
						<tr>
							<td><b>{{Messages RX abandonnés :}}</b></td>
							<td><span class="getNodeStats-commandsDroppedRX"></span></td>
						</tr>
						<tr>
							<td><b>{{Messages TX abandonnés :}}</b></td>
							<td><span class="getNodeStats-commandsDroppedTX"></span></td>
						</tr>
						<tr>
							<td><b>{{Réponses en délai dépassé :}}</b></td>
							<td><span class="getNodeStats-timeoutResponse"></span></td>
						</tr>
						<tr>
					</table>
					</div>
					<div class="tab-pane" id="tree">
						<div id="div_nodeDataTree"></div>
					</div>
				</div>
			</div>
		</div>
</div>
<?php include_file('desktop', 'nodeInformations', 'js', 'zwavejs');?>