import 'package:flutter/material.dart';
import 'package:flutter_frent/api_service.dart';
import 'package:flutter_frent/model/Demande.dart';
import 'package:flutter_frent/screens/home.dart';

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
    _getData();
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

    // Your asynchronous computation here (fetching data from an API, processing files, inserting something to the database, etc)







    //Navigator.of(context).pop();
 Navigator.of(context).pop();



    // Close the dialog programmatically
    // We use "mounted" variable to get rid of the "Do not use BuildContexts across async gaps" warning

//   Navigator.of(context).pop();
  }



 void _getData() async {


print('object');

      _list = (await ApiService().getlist())!;
    //    Future.delayed(Duration.zero, () => showAlertDialog(context));
Future.delayed(const Duration(seconds: 1)).then((value) => setState(() {

    }));
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
      title: Center(child: Text('اللجنة المنضمة لسباق الهجن ')),
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.vertical(
          bottom: Radius.circular(40.0),
        ),
      ),
    leading: IconButton(
    icon: Icon(Icons.arrow_back, color: Colors.black),
    onPressed: () =>
        Navigator.of(context).pushAndRemoveUntil(
        MaterialPageRoute(builder: (context) => MyHomePage()), (route) => false),
  ),

    ),
    body:ListView.separated(
    padding: const EdgeInsets.all(10),
    itemCount: _list.length,
    itemBuilder: (BuildContext context, int index) {
      return





InkWell(
    child:Container(
        height: 64,
     //   color: getCorrectColor(_list[index].accepted),
        decoration: BoxDecoration(
      border: Border.all(
          color: Colors.black, //color of border
          width: 2, //width of border
        ),
      borderRadius: BorderRadius.circular(20)
    ),

        child:  Center(child:
        Row(
            children: [ Text(' ${_list[index].cOMPID}'),
             Text(' ${_list[index].type}')],
        )),


      ),
    onTap: () {
        print("Click event on Container");
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
