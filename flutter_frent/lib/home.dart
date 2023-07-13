
import 'package:flutter/material.dart';
import 'package:flutter_frent/screens/home.dart';
import 'package:flutter_frent/screens/account.dart';

import 'package:flutter_frent/screens/settings.dart';
import 'package:flutter_frent/login.dart';

import 'package:shared_preferences/shared_preferences.dart';
import 'package:fluid_bottom_nav_bar/fluid_bottom_nav_bar.dart';


class MyHomePage extends StatefulWidget {
  const MyHomePage({Key? key}) : super(key: key);

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> with TickerProviderStateMixin {
 // TabController? _tabController;
  void reLogin() async {
    final prefs = await SharedPreferences.getInstance();
    if (prefs.getString('ud') != null) {
      setState(() {
      });
    } else {
      prefs.remove('adminName');
      prefs.remove(
        'uid',
      );
     Navigator.of(context).pushAndRemoveUntil(MaterialPageRoute(builder: (context) => LoginPage()), (route) => false);

    }
  }

//   @override
//   void initState() {
//     reLogin();
//     // TODO: implement initState
//     _tabController = TabController(length: 4, vsync: this);
//     super.initState();
//   }
Widget? _child;

  @override
  void initState() {
    _child = HomeContent();
    super.initState();
  }
  @override
  Widget build(BuildContext context) {
//     return Directionality(
//       textDirection: TextDirection.rtl,
//       child: Scaffold(
//         appBar: AppBar(
//           title: Text('تصاريح'),
//           backgroundColor: Color.fromARGB(200, 220, 84, 254),
//           centerTitle: true,
//           actions: [
//             TextButton(
//               onPressed: () {},
//               child: Row(
//                 mainAxisAlignment: MainAxisAlignment.center,
//                 crossAxisAlignment: CrossAxisAlignment.center,
//                 children: [
//                   Padding(
//                     padding: EdgeInsets.only(top: 8.0),

//                   ),
//                   Padding(
//                     padding: EdgeInsets.all(8.0),
//                     child: Icon(
//                       Icons.person,
//                       color: Colors.white,
//                     ),
//                   ),
//                 ],
//               ),
//             ),
//             VerticalDivider(
//               color: Colors.white,
//               width: 3,
//             ),
//             TextButton(
//               onPressed: () {},
//               child: Row(
//                 mainAxisAlignment: MainAxisAlignment.center,
//                 crossAxisAlignment: CrossAxisAlignment.center,
//                 children: const [
//                   Padding(
//                     padding: EdgeInsets.only(top: 8.0),
//                     child: Text(
//                       'تسجيل الخروج ',
//                       style: TextStyle(color: Colors.white),
//                     ),
//                   ),
//                   Padding(
//                     padding: EdgeInsets.all(8.0),
//                     child: Icon(
//                       Icons.logout,
//                       color: Colors.white,
//                     ),
//                   ),
//                 ],
//               ),
//             ),
//           ],
//           bottom: PreferredSize(
//             preferredSize: const Size.fromHeight(100),
//             child: TabBar(
//               controller: _tabController,
//               tabs: [
//                 Tab(
//                   icon: Row(
//                     children: const [
//                       Text('في انتظار المراجعة'),
//                       SizedBox(
//                         width: 10,
//                       ),
//                       Icon(Icons.watch_later_outlined)
//                     ],
//                   ),
//                 ),
//                 Tab(
//                   icon: Row(
//                     children: const [
//                       Text('قيد الإجراء'),
//                       SizedBox(
//                         width: 10,
//                       ),
//                       Icon(Icons.file_open_sharp)
//                     ],
//                   ),
//                 ),
//                 Tab(
//                   icon: Row(
//                     children: const [
//                       Text('جاهز للطباعة'),
//                       SizedBox(
//                         width: 10,
//                       ),
//                       Icon(Icons.print)
//                     ],
//                   ),
//                 ),
//                 Tab(
//                   icon: Row(
//                     children: const [
//                       Text('أخري'),
//                       SizedBox(
//                         width: 10,
//                       ),
//                       Icon(Icons.manage_accounts)
//                     ],
//                   ),
//                 ),
//               ],
//             ),
//           ),
//         ),
//         body: TabBarView(
//           controller: _tabController,
//           children: [
//             _tab_1(),
//             Text('data'),
//             Text('data'),
//             Text('data'),
//           ],
//         ),
//       ),
//     );
//   }

//    _tab_1() {
//   return Card(
//                 child: Padding(
//                   padding: const EdgeInsets.all(8.0),
//                   child: Row(
//                     children: [
//                       Column(
//                         mainAxisAlignment: MainAxisAlignment.start,
//                         crossAxisAlignment: CrossAxisAlignment.start,
//                         children: [
//                           Row(
//                             children: [
//                               const Text('رقم الهاتف'),
//                               const SizedBox(
//                                 width: 10,
//                               ),
//                               Text('s'),
//                             ],
//                           ),
//                           const SizedBox(
//                             height: 10,
//                           ),

//                           Row(
//                             children: [
//                               const Text('عدد المطايا'),
//                               const SizedBox(
//                                 width: 10,
//                               ),
//                               Text('s'),
//                             ],
//                           ),
//                         ],
//                       ),
//                       const Spacer(),
//                       ElevatedButton(
//                           onPressed: () {
//                             // Get.to(PdGen(
//                             //   name: data['name'],
//                             //   qid: data['qid'],
//                             //   phone: data['phone'],
//                             //   export_ca: data['export_ca'],
//                             //   send_place: data['send_place'],
//                             //   travail_date: data['travail_date'],
//                             //   minaa: data['minaa'],
//                             //   guess_date: data['guess_date'],
//                             //   camels: data['camels'],
//                             //   qidurl: data['id_photo'],
//                             // ));
//                           },
//                           child: Text('إستلام الطلب')),
//                     ],
//                   ),
//                 ),
//               );
//   }
// }

    return MaterialApp(
      home: Scaffold(
        backgroundColor: Color(0xFFEAC0DC),
        extendBody: true,
        body: _child,
        bottomNavigationBar: FluidNavBar(
          icons: [
            FluidNavBarIcon(
                icon: Icons.home,
                backgroundColor: Color.fromARGB(181, 137, 2, 174),
                extras: {"label": "home"}),
            FluidNavBarIcon(
                icon: Icons.account_circle,
                backgroundColor: Color.fromARGB(181, 137, 2, 174),
                extras: {"label": "account"}),
            FluidNavBarIcon(
                icon: Icons.settings,
                backgroundColor: Color.fromARGB(181, 137, 2, 174),
                extras: {"label": "settings"}),
          ],
          onChange: _handleNavigationChange,
          style: FluidNavBarStyle(
            iconSelectedForegroundColor: Colors.white,
              iconUnselectedForegroundColor: Colors.white60),
          scaleFactor: 1.5,
          defaultIndex: 0,
          itemBuilder: (icon, item) => Semantics(
            label: icon.extras!["label"],
            child: item,
          ),
        ),
      ),
    );
  }

  void _handleNavigationChange(int index) {
    setState(() {
      switch (index) {
        case 0:
          _child = HomeContent();
          break;
        case 1:
          _child = AccountContent();
          break;
        case 2:
          _child = SettingsContent();
          break;
      }
      _child = AnimatedSwitcher(
        switchInCurve: Curves.easeOut,
        switchOutCurve: Curves.easeIn,
        duration: Duration(milliseconds: 500),
        child: _child,
      );
    });
  }
}
