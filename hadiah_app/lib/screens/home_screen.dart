import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import '../providers/hadiah_provider.dart';
import '../widgets/hadiah_list.dart';

class HomeScreen extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Total Hadiah'),
      ),
      body: FutureBuilder(
        future: Provider.of<HadiahProvider>(context, listen: false).fetchHadiah(),
        builder: (ctx, snapshot) {
          if (snapshot.connectionState == ConnectionState.waiting) {
            return Center(child: CircularProgressIndicator());
          } else {
            return HadiahList();
          }
        },
      ),
    );
  }
}
