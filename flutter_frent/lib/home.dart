
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

 Color _primaryColor = Color.fromARGB(220,84,254,1000);
  Color _accentColor = Color.fromARGB(138,2,174,1000);
Widget? _child;

  @override
  void initState() {
    _child = HomeContent();
    super.initState();
  }
  @override
  Widget build(BuildContext context) {

    return MaterialApp(
      home: Scaffold(
        backgroundColor:_accentColor,
        extendBody: true,
        body: _child,
        bottomNavigationBar: FluidNavBar(
          icons: [
            FluidNavBarIcon(
                icon: Icons.home,
                backgroundColor: _accentColor,
                extras: {"label": "home"}),
            FluidNavBarIcon(
                icon: Icons.account_circle,
                backgroundColor: _accentColor,
                extras: {"label": "account"}),
            FluidNavBarIcon(
                icon: Icons.settings,
                backgroundColor: _accentColor,
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
