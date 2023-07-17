

import 'package:flutter/material.dart';
import 'package:flutter_frent/widgets/header_widget.dart';
import 'package:flutter_signature_pad/flutter_signature_pad.dart';
import 'package:syncfusion_flutter_signaturepad/signaturepad.dart';

import 'common/theme_helper.dart';
import 'dart:ui' as ui;



class TermContent extends StatelessWidget  {
      double _headerHeight = 250;
  Key _formKey = GlobalKey<FormState>();
  
  GlobalKey<SfSignaturePadState> _signaturePadKey = GlobalKey();

   void _handleSaveButtonPressed(BuildContext context) async {
     final data =
        await _signaturePadKey.currentState!.toImage(pixelRatio: 3.0);
    final bytes = await data.toByteData(format: ui.ImageByteFormat.png);
    await Navigator.of(context).push(
      MaterialPageRoute(
        builder: (BuildContext context) {
          return Scaffold(
            appBar: AppBar(),
            body: Center(
              child: Container(
                color: Colors.grey[300],
                child: Image.memory(bytes!.buffer.asUint8List()),
              ),
            ),
          );
        },
      ),
    );
  }
  @override
  Widget build( context) {

  final _screen =  MediaQuery.of(context).size;
    return Directionality(
      textDirection: TextDirection.rtl,
      child:Scaffold(
      backgroundColor: Colors.white,
      body: SingleChildScrollView(
        child: Column(
          children: [
            Container(
              height: _headerHeight,
              child: HeaderWidget(_headerHeight, true, Icons.login_rounded), //let's create a common header widget
            ),
            SafeArea(
              child: Container(
                padding: EdgeInsets.fromLTRB(20, 10, 20, 10),
                  margin: EdgeInsets.fromLTRB(20, 10, 20, 10),// This will be the login form
                child: Column(
                  children: [
                    Text(
                      'مرحبًا',
                      style: TextStyle(fontSize: 60, fontWeight: FontWeight.bold),
                    ),
                    Text(
                      'سجل الدخول إلى حسابك',
                      style: TextStyle(color: Colors.grey),
                    ),
                    SizedBox(height: 30.0),
                    Form(
                      key: _formKey,
                        child: Column(
                          children: [

                            Text('A noter : les textes juridiques ont pu faire l’objet de modifications postérieurement à la publication de cet article [mis à jour le 18 mars 2021]. C’est pourquoi, nous vous conseillons de regarder la date de la publication et de vérifier si les informations qui figurent dans l’article sont toujours d’actualité.Les conditions générales d’utilisation (CGU), contrairement aux mentions légales, ne sont pas obligatoires. Toutefois, la majorité des sites internet choisissent d’avoir une page de CGU. En effet, ces mentions s’avèrent très utiles.           Les conditions générales d’utilisation (CGU) d’un site web ne doivent pas être confondues avec les conditions générales de vente (CGV) :           Les CGU servent à réglementer l’utilisation d’un service (ici un site internet)            Les CGV servent à encadrer des relations commerciales (e-commerce, prestation de services, etc.           Pourquoi utiliser des Conditions générales d’utilisation            Les CGU définissent et encadrent les modalités de l’utilisation de votre site Internet, et déterminent les droits et les obligations respectifs de l’utilisateur et de l’éditeur dans le cadre de son utilisation. Elles permettent :           d’informer les internautes sur le fonctionnement général du site, les modalités et les règles que les utilisateurs doivent respecter en navigant ou utilisant le site internet           de définir la responsabilité de l’éditeur et de l’utilisateur du site ce qui permet à l’éditeur de se dédouaner en cas de comportement litigieux de certains utilisateurs           de prévoir des sanctions en cas de non-respect des conditions d’utilisation           et de prouver la bonne diligence du site           Dans quelle langue les CGU doivent-elles être rédigées            La rédaction des CGU en français s\'impose si vos clients sont des consommateurs ou utilisateurs finaux des biens, produits ou services.           La loi Toubon du 4 août 1994 relative à l’emploi de la langue française prévoit que « dans la désignation, l’offre, la présentation, le mode d’emploi ou d’utilisation, la description de l’étendue et des conditions de garantie d’un bien, d’un produit ou d’un service, l’emploi de la langue française est obligatoire » (art. 2).           Et l\'article L.111-1 du code de la consommation prévoit " qu\'avant que le consommateur ne soit lié par un contrat à titre onéreux, le professionnel communique au consommateur, de manière lisible et compréhensible".           Mais elle n\'est pas obligatoire entre professionnels, personnes de droit privé françaises et étrangères.           La circulaire d’application de cette loi (Circ. 19-3-1996 art. 2.1.1, 1) précise que « les factures et autres documents échangés entre professionnels, personnes de droit privé françaises et étrangères, qui ne sont pas consommateurs ou utilisateurs finaux des biens, produits ou services, ne sont pas visés » par l\'obligation d\'emploi de la langue française .           Si vous vendez à l\'étranger, la question essentielle est celle du droit applicable à votre service. La solution idéale est de rédiger vos CGU en français et d\'insérer une clause dans vos CGU qui prévoit la loi applicable en cas de litige et d\'opter pour le droit français pour faciliter la compréhension des engagements que vous prenez. Dans ce cas, il peut être aussi intéressant de  proposer des traductions à titre indicatif dans les autres langues.           Quelles informations faire figurer dans les CGU            La description des services, de la raison d’être et du fonctionnement du site interne           Vous devez préciser l’objectif du site et décrire les services que vous proposez. Préférez une description suffisamment large pour ne pas avoir à compléter vos CGU à chaque évolution de votre offre.           Les droits de l’utilisateur doivent être précisés, par exemple dans le cas de la création d’un espace personnel. Parmi les obligations qui peuvent lui être imposées, on peut citer celle :           de maintenir le caractère confidentiel de ses identifiants de connexion           d’utiliser le site conformément à sa destination           de ne pas tenter de nuire au bon fonctionnement du site           Ces dispositions des conditions générales d’utilisation permettent d’engager la responsabilité de l\'utilisateur en cas de dommage résultant du non-respect desdites obligations.           Par exemple, si le site se compose d’un espace adhérant, les CGU peuvent indiquer comment se déroule une création de compte, son rôle, les utilisations permises et interdites et son fonctionnement, jusqu’à sa suppression.           De même, si l’utilisateur a la possibilité de poster des informations sur le site, il peut être intéressant d’indiquer les règles d’utilisation.           Les dispositions relatives à la propriété intellectuell           Il est utile de rappeler que les éléments du site sont protégés par le droit de la propriété intellectuelle (droit d’auteur) et que leur utilisation sans le consentement de l’éditeur est interdite.           Si vous postez des articles, logos, documents sur votre site internet, il est important de vous réserver, en tant qu’éditeur le droit d’utilisation, d’exploitation et de reproduction de ces éléments et ainsi les protéger contre le plagiat ou une reproduction illégale.           Vous pouvez par exemple indiquer que :           toutes les informations disponibles sur le site relèvent de la propriété de l’éditeur et sont protégés par le droit de la propriété intellectuelle et plus particulièrement le droit d’auteur           les informations figurant sur le site sont uniquement disponibles à des fins de consultation par les utilisateurs, à défaut d’un accord préalable et exprès           toute utilisation totale ou partielle du site ou de son contenu, par quelque procédé que ce soit ou sur quelque support que ce soit, à des fins commerciales ou publicitaires, est interdite et engage la responsabilité de l’utilisateur           Il faut toutefois prévoir la possibilité d’utiliser ces informations à des fins personnelles.           Les règles délimitant la responsabilité de l’éditeur du sit           Il est important d’indiquer que l’éditeur met tout en œuvre pour assurer l’exactitude et la mise à jour des informations fournies sur le site, bien que ces informations peuvent être erronées.           De plus, il vous faut délimiter votre responsabilité dans le cas où le site est inaccessible pour cause de problèmes techniques ou encore dans le cas où vous pointez depuis votre site, via des liens hypertextes, vers des sources extérieures, dont l’exactitude peut être remise en cause.           Si vos articles sont ouverts aux commentaires ou si votre site dispose d’un forum, il est utile de vous dédouaner de toute responsabilité du fait des utilisateurs du site, par exemple si ces derniers publient du contenu erroné ou des propos injurieux.           Droit applicable et juridiction compétent           En cas de contentieux, une clause relative aux modalités de règlement du litige permet d’imposer une tentative de règlement amiable du litige avant toute saisine judiciaire.           Où renseigner les CGU            Il a été jugé que la simple présence de CGU sur un site internet ne les rendaient pas opposables aux internautes. Pour qu’elles le soient, il faut s’assurer qu’elles ont été effectivement lues et acceptées.           La façon d’afficher vos CGU dépend donc du fait que vous voulez les rendre opposables ou non. En tant qu’éditeur, ce choix peut être fait en tenant compte du type d’activité de votre site :           s’il s’agit d’un site d’information, que l’utilisateur est passif, c’est-à-dire qu’il n’est pas amener à poster des informations, à renseigner des formulaires, les CGU peuvent être présentées comme de simples mentions informatives, car le risque de litige est faible           dans le cas contraire, si l’utilisateur est amené à participer activement au site, par exemple via un compte personnel ou dans un forum, il est préférable d’opter pour un système qui permette de s’assurer qu’il a pris connaissance et consent aux CGU           Présenter les CGU comme simples mentions informative           Vous informez l’internaute sur le fonctionnement du site et les CGU ne leur sont pas opposables. Cela signifie qu’en cas de problème, vous ne pouvez pas vous prévaloir des CGU pour sanctionner les utilisateurs.           Dans ce cas l’objectif est donc de rendre les CGU visibles afin que l’utilisateur  prenne utilement connaissance des règles qui s’appliquent à sa navigation sur le site.           Présentez les sur une page web dédiée accessible via un lien placé en haut ou au pied de la page d’accueil du site.           Donner aux CGU une force contractuelle'),



                            SizedBox(height: 10.0),


                            SizedBox(height: 15.0),

Container(
                              decoration: ThemeHelper().buttonBoxDecoration(context),
                              child:ElevatedButton(
        onPressed: () {
          showDialog(
            context: context,
            builder: (context) {
              return  AlertDialog(
        contentPadding: const EdgeInsets.all(6.0),
        title: Text('إمضاء'),
        content: Column(mainAxisAlignment: MainAxisAlignment.start,
        mainAxisSize: MainAxisSize.min,
        children: [SfSignaturePad(
key: _signaturePadKey,
                      backgroundColor: Colors.white,
                      strokeColor: Colors.black,
                      minimumStrokeWidth: 1.0,
                      maximumStrokeWidth: 4.0),]),
            actions: [
ElevatedButton(                     // FlatButton widget is used to make a text to work like a button

                  onPressed: () {
                    Navigator.of(context).pop();
                  },             // function used to perform after pressing the button
                  child: Text('إلغاء'),
                ),
                ElevatedButton(

                  onPressed: () async {
                      ui.Image image = await _signaturePadKey.currentState!.toImage();
                      print(image.clone.toString());
                      _handleSaveButtonPressed(context);
   Navigator.of(context).pop();
                  },
                  child: Text('قبول'),
                ),
            ],
          );
            },
          );
        },
       child: Padding(
                                  padding: EdgeInsets.fromLTRB(40, 10, 40, 10),
                                  child: Text('إمضاء'),),
style: ThemeHelper().buttonStyle(),
      ),
),


                            Container(
                              decoration: ThemeHelper().buttonBoxDecoration(context),
                              child: ElevatedButton(
                                style: ThemeHelper().buttonStyle(),
                                child: Padding(
                                  padding: EdgeInsets.fromLTRB(40, 10, 40, 10),
                                  child: Text('تسجيل الدخول'.toUpperCase(), style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold, color: Colors.white),),
                                ),
                                onPressed: () async {








                                    //_selectedValue!.id
                                  //After successful login we will redirect to profile page. Let's create profile page now
                              //
                                },
                              ),
                            ),

                          ],
                        )
                    ),
                  ],
                )
              ),
            ),
          ],
        ),
      ),
    ));

}


}
