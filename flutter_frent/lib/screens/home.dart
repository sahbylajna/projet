import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:tasareeh/api_service.dart';
import 'package:tasareeh/model/count.dart';
import 'package:tasareeh/screens/back.dart';
import 'package:tasareeh/screens/book.dart';
import 'package:tasareeh/screens/in.dart';
import 'package:tasareeh/screens/out.dart';


class HomeContent extends StatefulWidget {

 @override
  _HomeContentState createState() => _HomeContentState();

}


class _HomeContentState extends State<HomeContent> {
  count? _count;
  String importations = '0';
  String exports = '0';
  String backs = '0';
  // Remove the GlobalKey
  // GlobalKey<State> _dialogKey = GlobalKey<State>();
  Color _primaryColor = Color.fromARGB(220,84,254,1000);
  Color _accentColor = Color.fromARGB(138,2,174,1000);
  @override
  void initState() {
    super.initState();
    Future.delayed(Duration.zero, () {
      _fetchData(context);
    });
  }

  bool isLoading = true;
void _fetchData(BuildContext context) async {
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


  try {
    _count = await ApiService().getcount();
    exports = _count!.exports;
    importations = _count!.importations;
    backs = _count!.backs;
    isLoading = false;
    // Close the dialog after a 2-second delay
  if(_count != null){
      Future.delayed(Duration(seconds: 2), () {
      if (Navigator.of(context, rootNavigator: true).canPop()) {
        Navigator.of(context, rootNavigator: true).pop(); // Close the dialog
        print(_count.toString());

      }
    });
      isLoading = false;
  }
  } catch (e) {
    print('Error: $e');
    // Dismiss the dialog using the original context
    if (Navigator.of(context, rootNavigator: true).canPop()) {
      Navigator.of(context, rootNavigator: true).pop();
    }
  }

}



  @override
  Widget build(context) {
     //_fetchData(context) ;
    var borderRadius = BorderRadius.circular(8.0);

    return Directionality(
        textDirection: TextDirection.rtl,
        child:Scaffold(
        appBar:    AppBar(
          flexibleSpace: Container(
            decoration: BoxDecoration(
              gradient: LinearGradient(
                colors: [_accentColor, _primaryColor], // Add your colors here
                begin: Alignment.topCenter,
                end: Alignment.bottomCenter,
              ),
            ),
          ),
          title: Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              Image.asset(
                'assets/logo.png',
                width: 80,
                height: 80,
              ),
              Text('اللجنة المنضمة لسباق الهجن', style: TextStyle(fontSize: 20)),
              SizedBox(width: 40, height: 40), // Empty SizedBox for spacing
            ],
          ),
          toolbarHeight: 150, // Set the height of the AppBar
        ),
    body:  isLoading ?Text('اللجنة المنضمة لسباق الهجن', style: TextStyle(fontSize: 20)):
      Center(
        child: Column(
        mainAxisAlignment: MainAxisAlignment.spaceEvenly,
        children: <Widget>[


       Row(
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [
      OutlinedButton(
        onPressed: () {

             Navigator.of(context).pushAndRemoveUntil(
                 MaterialPageRoute(builder: (context) => InContent()),
                     (route) => true);
        },

   style: OutlinedButton.styleFrom(

      foregroundColor: Colors.white,
      side:BorderSide(color: _primaryColor),
      shape: const RoundedRectangleBorder(
              borderRadius: BorderRadius.all(
                Radius.circular(18),
              ),
            ),

 backgroundColor: Colors.white,
      elevation: 20,
       fixedSize: Size(150,200),
    ),
  child: Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children: [
        SizedBox(
      height: 10, // <-- SEE HERE
    ),
          Row(
            textDirection: TextDirection.rtl,
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [
    Text(
        importations ,
        style: Theme.of(context).textTheme.titleMedium,
      ),
         SizedBox(
      width: 30, // <-- SEE HERE
    ),
 Image.asset('assets/in.png',height: 50,
    width: 50,)

  ]),
SizedBox(
      height: 100, // <-- SEE HERE
    ),

    Row(
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [

      Text(" طلب دخول",style: TextStyle(color: _accentColor)),

      SizedBox(
      width: 50, // <-- SEE HERE
    ),
  ]),

    ],

  ),
    ),






 OutlinedButton(
        onPressed: () {
             Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => OutContent()));
        },

   style: OutlinedButton.styleFrom(

      foregroundColor: Colors.white,
      side:BorderSide(color: _primaryColor),
      shape: const RoundedRectangleBorder(
              borderRadius: BorderRadius.all(
                Radius.circular(18),
              ),
            ),

 backgroundColor: Colors.white,
      elevation: 20,
       fixedSize: Size(150,200),
    ),
  child: Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children: [
        SizedBox(
      height: 10, // <-- SEE HERE
    ),
          Row(
            textDirection: TextDirection.rtl,
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [
    Text(
         exports ,
        style: Theme.of(context).textTheme.titleMedium,
      ),
         SizedBox(
      width: 30, // <-- SEE HERE
    ),
 Image.asset('assets/out.png',height: 50,
    width: 50,)

  ]),
SizedBox(
      height: 100, // <-- SEE HERE
    ),

    Row(
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [

      Text(" طلب خروج",style: TextStyle(color: _accentColor)),

      SizedBox(
      width: 50, // <-- SEE HERE
    ),
  ]),

    ],

  ),
    ),



  ],
),












       Row(
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [
      OutlinedButton(
        onPressed: () {
             Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => BackContent()));
        },

   style: OutlinedButton.styleFrom(

      foregroundColor: Colors.white,
     side:BorderSide(color: _primaryColor),
      shape: const RoundedRectangleBorder(
              borderRadius: BorderRadius.all(
                Radius.circular(18),
              ),
            ),

 backgroundColor: Colors.white,
      elevation: 20,
       fixedSize: Size(150,200),
    ),
  child: Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children: [
        SizedBox(
      height: 10, // <-- SEE HERE
    ),
          Row(
            textDirection: TextDirection.rtl,
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [
    Text(
        backs,
        style: Theme.of(context).textTheme.titleMedium,
      ),
         SizedBox(
      width: 30, // <-- SEE HERE
    ),
 Image.asset('assets/back.png',height: 50,
    width: 50,)

  ]),
SizedBox(
      height: 100, // <-- SEE HERE
    ),

    Row(
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [

      Text(" طلب عوده",style: TextStyle(color: _accentColor)),

      SizedBox(
      width: 50, // <-- SEE HERE
    ),
  ]),

    ],

  ),
    ),






 OutlinedButton(
        onPressed: () {
             Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => BookContent()));
        },

   style: OutlinedButton.styleFrom(

      foregroundColor: Colors.white,
     side:BorderSide(color: _primaryColor),
      shape: const RoundedRectangleBorder(
              borderRadius: BorderRadius.all(
                Radius.circular(18),
              ),
            ),

 backgroundColor: Colors.white,
      elevation: 20,
       fixedSize: Size(150,200),
    ),
  child: Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children: [
        SizedBox(
      height: 10, // <-- SEE HERE
    ),
          Row(
            textDirection: TextDirection.rtl,
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [

Icon( Icons.book_outlined,size: 30, color: Color.fromARGB(255, 153, 117, 96)),

  ]),
SizedBox(
      height: 100, // <-- SEE HERE
    ),

    Row(
  mainAxisAlignment: MainAxisAlignment.spaceEvenly,
  children: [

      Text(" طلب خروج",style: TextStyle(color: _accentColor)),

      SizedBox(
      width: 50, // <-- SEE HERE
    ),
  ]),

    ],

  ),
    ),



  ],
),
























        ],)
      )

    ));
  }
}

