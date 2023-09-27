import 'package:flutter/material.dart';
import 'package:tasareeh/api_service.dart';
import 'package:tasareeh/model/Demande.dart';
import 'package:tasareeh/screens/show.dart';

import '../home.dart';
class BookContent extends StatefulWidget{
  const BookContent({Key? key}): super(key:key);

  @override
  _BookContentState createState() => _BookContentState();
}



class _BookContentState extends State<BookContent>{
 Color _primaryColor = Color.fromARGB(220,84,254,1000);
  Color _accentColor = Color.fromARGB(138,2,174,1000);
       late List<Demande> _list = [];
@override
  void initState() {
    super.initState();
    Future.delayed(Duration.zero, () {
      _getData(context);
    });
  //  showAlertDialog(context);
  }




showAlertDialog(BuildContext context) async {

    showDialog(
        // The user CANNOT close this dialog  by pressing outsite it
        barrierDismissible: false,
        context: context,
        builder: (_) {
          return Dialog(
            // The background color
            backgroundColor: Colors.white,
            child: Padding(
              padding: const EdgeInsets.symmetric(vertical: 20),
              child: Column(
                mainAxisSize: MainAxisSize.min,
                children: const [
                  // The loading indicator
                  CircularProgressIndicator(),
                  SizedBox(
                    height: 15,
                  ),
                  // Some text
                  Text('تحميل...')
                ],
              ),
            ),
          );
        });








    //Navigator.of(context).pop();
 Navigator.of(context).pop();



  }



 void _getData(BuildContext context) async {

   showDialog(
     barrierDismissible: false,
     context: context,
     builder: (_) {
       return Dialog(
         backgroundColor: Colors.white,
         child: Padding(
           padding: const EdgeInsets.symmetric(vertical: 20),
           child: Column(
             mainAxisSize: MainAxisSize.min,
             children: [
               Image.asset('assets/loding.gif'),
               SizedBox(height: 15),
               Text('...تحميل'),

             ],
           ),
         ),
       );
     },
   );
      _list = (await ApiService().getlist())!;
    //    Future.delayed(Duration.zero, () => showAlertDialog(context));
Future.delayed(const Duration(seconds: 1)).then((value) => setState(() {

    }));

   if(_list != null){
     Future.delayed(Duration(seconds: 2), () {
       if (Navigator.of(context, rootNavigator: true).canPop()) {
         Navigator.of(context, rootNavigator: true).pop(); // Close the dialog
       }
     });
   }



  }


  Color getCorrectColor(accepted) {
  if (accepted == "1") {
    return Colors.green;
  }else if(accepted == "2"){
    return Colors.red;
  }

  return Colors.white;
}


  @override
  Widget build(BuildContext context) {
     return Directionality(
        textDirection: TextDirection.rtl,
        child:Scaffold(
        appBar: AppBar(
          title: Center(child: Text('اللجنة المنضمة لسباق الهجن')),
          shape: RoundedRectangleBorder(
            borderRadius: BorderRadius.vertical(
              bottom: Radius.circular(40.0),
            ),
          ),
          leading: IconButton(
            icon: Icon(Icons.arrow_back, color: Colors.black),
            onPressed: () => Navigator.of(context).pushAndRemoveUntil(
                MaterialPageRoute(builder: (context) => MyHomePage()),
                    (route) => false),
          ),
          flexibleSpace: Container(
            decoration: BoxDecoration(
              borderRadius: BorderRadius.only(
                bottomLeft: Radius.circular(40.0),
                bottomRight: Radius.circular(40.0),
              ),
              gradient: LinearGradient(
                colors: [_primaryColor, _accentColor], // Start and end colors
                begin: Alignment.centerLeft,
                end: Alignment.centerRight,
              ),
            ),
          ),
        ),
    body:ListView.separated(
    padding: const EdgeInsets.all(10),
    itemCount: _list.length,
    itemBuilder: (BuildContext context, int index) {
      return InkWell(
    child:Container(
        height: 90,
     //   color: getCorrectColor(_list[index].accepted),
        decoration: BoxDecoration(
      border: Border.all(
          color: _accentColor, //color of border
          width: 2, //width of border
        ),
      borderRadius: BorderRadius.circular(20)
    ),

        child:
Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children: [
        Row(
             textDirection: TextDirection.rtl,
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
            children: [

                 Text(' ${_list[index].cERTYPE}/${_list[index].cOMPID}'),

             Text(' ${_list[index].type}')],
        )
        ,


       Text(_list[index].accepted == "0" ? 'تم رفض طلبك من اللجنة المنضمة لسباق الهجن و ذلك لسبب :${_list[index].reson}' : '${_list[index].accepted}' ),



],
        )
        ,
      ),
    onTap: () {
      print(_list[index].animal?.length.toString());
      Navigator.of(context).pushAndRemoveUntil(
        MaterialPageRoute(
          builder: (context) => showContent(paramValue: _list[index]), // Pass the parameter
        ),
            (route) => false,
      );
        print("Click event on x");
    },
)





      ;
    },
    separatorBuilder: (BuildContext context, int index) => const Divider(),
  )

    )
    );
  }
}
