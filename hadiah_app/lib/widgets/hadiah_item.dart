import 'package:flutter/material.dart';
import '../models/hadiah.dart';
import 'package:provider/provider.dart';
import '../providers/hadiah_provider.dart';

class HadiahItem extends StatelessWidget {
  final Hadiah hadiah;

  HadiahItem({required this.hadiah});

  @override
  Widget build(BuildContext context) {
    return Card(
      margin: EdgeInsets.symmetric(vertical: 10, horizontal: 15),
      child: ListTile(
        title: Text(hadiah.hadiah),
        subtitle: Text(hadiah.toko),
        trailing: IconButton(
          icon: Icon(hadiah.received ? Icons.check : Icons.close),
          onPressed: () {
            showDialog(
              context: context,
              builder: (ctx) => AlertDialog(
                title: Text('Ingin terima hadiah?'),
                actions: <Widget>[
                  TextButton(
                    child: Text('Terima'),
                    onPressed: () {
                      Provider.of<HadiahProvider>(context, listen: false).updateHadiahStatus(hadiah.toko, true, '');
                      Navigator.of(ctx).pop();
                    },
                  ),
                  TextButton(
                    child: Text('Tolak'),
                    onPressed: () {
                      Provider.of<HadiahProvider>(context, listen: false).updateHadiahStatus(hadiah.toko, false, 'Alasan');
                      Navigator.of(ctx).pop();
                    },
                  ),
                ],
              ),
            );
          },
        ),
      ),
    );
  }
}
