# Progiciel de Gestion de Paie
<h2>1. Description du projet :</h2>
<p align="justify">
L’objectif de ce projet est de réaliser une application web de gestion de la paie. Elle doit permettre le paramétrage dynamique des règles de la paie.
</p>
<h2>2. Spécifications fonctionnelles du projet :</h2>
<p align="justify">
Le projet en cours vise à mettre en place une application de gestion dynamique et paramétrable des règles de calcul de la paie des employés.
</p>
<p align="justify">
Les règles de calcul de la paie dépendent de l’entreprise en question et du statut de l’employé.
</p>
<h3>a. Espace Responsable Ressources Humaines :</h3>
<ul>
    <li>Le responsable est en charge de l’ajout et la mise à jour des entreprises au niveau de l’application.</li>
    <li>Le responsable RH est en charge de la gestion des employés. Chaque employé est affecté à une entreprise. Toutes les informations relatives à l’employé doivent être renseignées au niveau de l’application pour permettre le calcul automatique de sa paie </li>
    <li>(informations personnelles, situation familiale, informations bancaires, CNSS, CIMR etc.)</li>
    <li>Le responsable RH se charge de la saisie des absences, congés, primes et heures supplémentaires.</li>
</ul>
<h3>b. Espace Responsable de la Paie :</h3>
<ul>
    <li>Le responsable de la paie est en charge de la définition des rubriques de paie. ces dernières sont dynamiques et peuvent être modifiées à tout moment par le responsable de la paie.</li>
    <li>Pour chaque rubrique, on définit des règles de calcul.</li>
    <li>Les règles sont affectées aux entreprises. Ces dernières peuvent avoir des règles différentes pour la même rubrique de paie, mais une seule règle par entreprise et par rubrique.</li>
    <li>Le responsable de la paie peut visualiser et exporter un bulletin de paie sous format pdf ou excel.</li>
</ul>
<h3>c. Espace Employé :</h3>
    <li>L’employé a un espace dédié où il peut visualiser ses informations personnelles. Il peut aussi visualiser ses absences, congés et heures supp. En cas d’erreur, l’employé peut envoyer une réclamation au responsable RH ou de paie.</li>
<h3>d. Règles de calcul de la paie :</h3>
<p align="justify">
Le salaire ou rémunération net d’un employé est calculé à partir de son salaire de base auquel s’ajoutent des majorations et sont retranchées les retenues :
</p>
<ul>
<li>Salaire net = salaire de base + majorations – retenues</li>
<li>Salaire de base : correspond au salaire contractuel convenu entre le salarié et l’employeur.</li>
<li>Les majorations comprennent les heures supplémentaires, les primes et les allocations familiales.</li>
<li>Les allocations familiales = 200Dhs pour chacun des trois premiers enfants et 36Dhs pour les trois suivants.</li>
<li>Les retenues= cotisation CNSS+Cotisation AMO+ Cotisation CIMR (si employé inscrit) +IGR</li>
</ul>
<h2>3. Autres spécifications :</h2>
<ul>
    <li>Technologie : SGBDR, HTML, PHP, JavaScript, XML, CSS.</li>
    <li>Interfaces : Ergonomiques, Faciles à manipuler.</li>
    <li>Sécurité : L’application doit garantir un accès sécurisé à tous les espaces.</li>
</ul>