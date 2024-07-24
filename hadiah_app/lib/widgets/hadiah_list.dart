import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import '../providers/hadiah_provider.dart';
import 'hadiah_item.dart';

class HadiahList extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    final hadiahData = Provider.of<HadiahProvider>(context);
    final hadiahList = hadiahData.hadiahList;

    return ListView.builder(
      itemCount: hadiahList.length,
      itemBuilder: (ctx, index) => HadiahItem(hadiah: hadiahList[index]),
    );
  }
}
